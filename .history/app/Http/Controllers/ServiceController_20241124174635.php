<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;

class ServiceController extends Controller
{
    /**
     * Display a listing of services.
     */
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

        // Simple array of categories for the category list
        $categoryList = [
            'Academic', 'Arts', 'Tech Skills', 'Languages', 'Business', 'Fitness'
        ];

        // Nested array for search suggestions
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

    /**
     * Show the form for creating a new service.
     */
    public function create(): View
    {
        return view('services.create');
    }

    /**
     * Store a newly created service.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
        ]);

        $service = $request->user()->services()->create($validated);

        return redirect()->route('services.show', $service)
            ->with('success', 'Service created successfully!');
    }

    /**
     * Display the specified service.
     */
    public function show(Service $service): View
    {
        $service->load('user');
        $availableSlots = $this->getAvailableTimeSlots($service);

        return view('services.show', compact('service', 'availableSlots'));
    }

    private function getAvailableTimeSlots(Service $service)
    {
        $slots = [];
        $start = Carbon::tomorrow();
        $end = Carbon::tomorrow()->addDays(7);

        while ($start <= $end) {
            for ($hour = 9; $hour < 17; $hour++) {
                $time = $start->copy()->setHour($hour);

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

    /**
     * Show the form for editing the specified service.
     */
    public function edit(Service $service): View
    {
        $this->authorize('update', $service);

        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified service.
     */
    public function update(Request $request, Service $service)
    {
        $this->authorize('update', $service);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        $service->update($validated);

        return redirect()->route('services.show', $service)
            ->with('success', 'Service updated successfully!');
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
     * Display services by category.
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
     * Search for services.
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
