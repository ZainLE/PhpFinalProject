<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\View\View;

class BookingController extends Controller
{
    /**
     * This is displaying list of bookings
     */
    public function index(): View
    {
        $bookings = Booking::where('user_id', auth()->id())
            ->with(['service', 'service.user'])
            ->latest()
            ->paginate(10);

        return view('bookings.index', compact('bookings'));
    }

    public function create(Service $service)
    {
        // Time slots that are available for next 7 days
        $availableSlots = $this->getAvailableTimeSlots($service);

        return view('bookings.create', compact('service', 'availableSlots'));
    }

    public function store(Request $request, Service $service)
    {
        $validated = $request->validate([
            'booking_date' => 'required|date|after:now',
            'notes' => 'nullable|string|max:500',
        ]);

        $booking = $service->bookings()->create([
            'user_id' => auth()->id(),
            'booking_date' => $validated['booking_date'],
            'notes' => $validated['notes'] ?? null,
            'status' => 'confirmed'
        ]);

        return view('bookings.confirmation', compact('booking'));
    }

    public function show(Booking $booking)
    {
        // Ensure the user can only view their own bookings
        if (auth()->id() !== $booking->user_id && auth()->id() !== $booking->service->user_id) {
            abort(403);
        }

        return view('bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        // Check if user owns this booking
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }

        $service = $booking->service;
        $selectedDate = Carbon::parse($booking->booking_date)->format('Y-m-d');

        // Get existing bookings for this service on the selected date
        $existingBookings = Booking::where('service_id', $service->id)
            ->whereDate('booking_date', $selectedDate)
            ->where('id', '!=', $booking->id) // Exclude current booking
            ->get()
            ->pluck('booking_date')
            ->map(function($date) {
                return Carbon::parse($date)->format('H:i');
            })
            ->toArray();

        // Generate time slots
        $timeSlots = [];
        for ($hour = 9; $hour <= 17; $hour++) {
            $time = sprintf('%02d:00', $hour);
            $timeSlots[] = [
                'time' => $time,
                'formatted' => Carbon::createFromFormat('H:i', $time)->format('g:i A'),
                'available' => !in_array($time, $existingBookings),
                'selected' => Carbon::parse($booking->booking_date)->format('H:i') === $time
            ];
        }

        return view('bookings.edit', [
            'booking' => $booking,
            'service' => $service,
            'selectedDate' => $selectedDate,
            'timeSlots' => $timeSlots
        ]);
    }

    public function update(Request $request, Booking $booking)
    {
        // Check if user owns this booking
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'date' => 'required|date|after:now',
            'time' => 'required',
            'notes' => 'nullable|string|max:500',
        ]);

        // Combine date and time
        $bookingDateTime = Carbon::parse($validated['date'])->format('Y-m-d') . ' ' . $validated['time'];

        $booking->update([
            'booking_date' => $bookingDateTime,
            'notes' => $validated['notes'] ?? null
        ]);

        return redirect()->route('bookings.index')
            ->with('success', 'Booking updated successfully!');
    }

    public function destroy(Booking $booking)
    {
        // Check if user owns this booking
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }

        $booking->delete();

        return redirect()->route('bookings.index')
            ->with('success', 'Booking cancelled successfully!');
    }

    private function getAvailableTimeSlots(Service $service)
    {
        $slots = [];
        $start = Carbon::tomorrow();
        $end = Carbon::tomorrow()->addDays(7);

        while ($start <= $end) {
            // Add business hours (9 AM to 5 PM)
            for ($hour = 9; $hour < 17; $hour++) {
                $time = $start->copy()->setHour($hour);

                // Check if slot is not already booked
                $isAvailable = !$service->bookings()
                    ->where('booking_date', $time)
                    ->exists();

                if ($isAvailable) {
                    $slots[] = $time;
                }
            }
            $start->addDay();
        }

        return $slots;
    }
}
