<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Models\Booking;

class ServiceController extends Controller
{ /**  * Display a listing of services.  */
    public function index(): View
    {
              $services = Service::with(['user'])
            ->where('is_active', true)
            ->latest()
            ->paginate(12);

        $spanishCities = [
            'Madrid', 'Barcelona', 'Valencia', 'Sevilla', 'Zaragoza',
            'Málaga', 'Murcia', 'Palma', 'Bilbao', 'Alicante',
            'Córdoba', 'Valladolid', 'Vigo', 'Gijón', 'Granada'
        ];
        // Array of categories
        $categoryList = [
            'Academic', 'Arts', 'Tech Skills', 'Languages', 'Business', 'Fitness'
        ];
        // Array for search suggestions
        $searchSuggestions = [
            'Academic' => ['Math Tutor', 'Science Teacher', 'Language Instructor'],
            'Arts' => ['Piano Teacher', 'Art Instructor', 'Dance Coach'],
            'Tech Skills' => ['Web Developer', 'Mobile App Developer', 'Data Scientist'],
            'Languages' => ['English Tutor', 'Spanish Teacher', 'Mandarin Instructor'],
            'Business' => ['Business Coach', 'Marketing Consultant', 'Financial Advisor'],
            'Fitness' => ['Personal Trainer', 'Yoga Instructor', 'Nutrition Coach']
        ];

        return view('services.index', compact(
            'services',
            'spanishCities',
            'categoryList',
            'searchSuggestions'
        ));
    }
     /**   * Display the specified service.   */
    public function show(Service $service): View
    {
        $date = request('date', now()->format('Y-m-d'));
    // Getting all bookings for this service on the selected date
        $existingBookings = Booking::where('service_id', $service->id)
            ->whereDate('booking_date', $date)
            ->pluck('booking_date')
            ->map(function($date) {
                return Carbon::parse($date)->format('H:i');
            })
            ->toArray();
        // Generate available time slots
        $availableSlots = collect(range(9, 17))->map(function($hour) use ($existingBookings) {
            $time = sprintf('%02d:00', $hour);
            return [
                'time' => $time,
                'available' => !in_array($time, $existingBookings)
            ];
        });
        return view('services.show', compact('service', 'availableSlots'));
    }

    /**
     * Remove the specified service.
     */
    public function destroy(Service $service)
    {
        $this->authorize('delete', $service);

        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Service deleted successfully!');
    }

    /**
     * Displaying services by category.
     */
    public function byCategory(string $category): View
    {
        $services = Service::with('user')
            ->where('category', $category)
            ->active()
            ->latest()
            ->paginate(12);

        return view('services.by-category', compact('services', 'category'));
    }

    /**
     * Searching for services.
     */
    public function search(Request $request): View
    {
        $query = $request->input('query');
        $location = $request->input('location');

        $services = Service::with(['user'])
            ->where('is_active', true)
            ->when($query, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%")
                      ->orWhere('category', 'like', "%{$search}%");
                });
            })
            ->when($location, function ($query, $location) {
                return $query->where('location', $location);
            })
            ->latest()
            ->paginate(12);

        $spanishCities = [
            'Madrid', 'Barcelona', 'Valencia', 'Sevilla', 'Zaragoza',
            'Málaga', 'Murcia', 'Palma', 'Bilbao', 'Alicante',
            'Córdoba', 'Valladolid', 'Vigo', 'Gijón', 'Granada'
        ];

        return view('services.search', compact('services', 'query', 'location', 'spanishCities'));
    }
}
