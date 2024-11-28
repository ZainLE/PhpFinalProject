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
     * Display a listing of the user's bookings.
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
        $date = request('date', now()->format('Y-m-d'));

        // Get all existing bookings for this service on the selected date
        $existingBookings = Booking::where('service_id', $service->id)
            ->whereDate('booking_date', $date)
            ->get()
            ->pluck('booking_date')
            ->map(function($date) {
                return Carbon::parse($date)->format('H:i');
            })
            ->toArray();

        // Generate time slots for the day (9 AM to 5 PM)
        $timeSlots = [];
        for ($hour = 9; $hour <= 17; $hour++) {
            $time = sprintf('%02d:00', $hour);
            $timeSlots[] = [
                'time' => $time,
                'formatted' => Carbon::createFromFormat('H:i', $time)->format('g:i A'),
                'available' => !in_array($time, $existingBookings)
            ];
        }

        return view('bookings.create', compact('service', 'timeSlots'));
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
