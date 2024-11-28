<x-layouts.site>
    <x-slot name="hero">
        <div class="container mx-auto px-4 pt-20">
            <h1 class="text-white text-4xl md:text-5xl font-bold text-center mb-6">
                Book {{ $service->title }}
            </h1>
            <p class="text-indigo-100 text-center text-xl mb-12">
                Select your preferred date and time
            </p>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 py-12">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <!-- Service Summary -->
                <div class="mb-8 border-b pb-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-indigo-100 rounded-full mr-4">
                            <img src="https://i.pravatar.cc/48?u={{ $service->user_id }}"
                                 alt="{{ $service->user->name }}"
                                 class="w-12 h-12 rounded-full object-cover">
                        </div>
                        <div>
                            <h3 class="font-semibold">{{ $service->user->name }}</h3>
                            <p class="text-gray-600 text-sm">{{ $service->category }}</p>
                        </div>
                        <div class="ml-auto">
                            <p class="text-xl font-bold text-indigo-600">${{ number_format($service->price, 2) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Booking Form -->
                <form method="POST" action="{{ route('bookings.store', $service) }}">
                    @csrf

                    <!-- Date Selection -->
                    <input type="hidden" name="date" value="{{ $selectedDate }}">

                    <!-- Time Slots -->
                    <div class="grid grid-cols-3 gap-4">
                        @foreach($timeSlots as $slot)
                            <div class="relative">
                                <input type="radio"
                                       name="time"
                                       id="time_{{ $slot['time'] }}"
                                       value="{{ $slot['time'] }}"
                                       {{ !$slot['available'] ? 'disabled' : '' }}
                                       class="peer hidden">
                                <label for="time_{{ $slot['time'] }}"
                                       class="block p-4 text-center rounded-lg border
                                              {{ $slot['available']
                                                 ? 'cursor-pointer peer-checked:border-indigo-600 peer-checked:bg-indigo-50 hover:border-indigo-600'
                                                 : 'bg-gray-100 text-gray-400 cursor-not-allowed' }}">
                                    {{ $slot['formatted'] }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <!-- Notes field if you have one -->
                    <div class="mt-4">
                        <textarea name="notes" rows="4" class="w-full rounded-lg border-gray-300"
                                  placeholder="Add any notes for your booking..."></textarea>
                    </div>

                    <button type="submit" class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                        Confirm Booking
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.site>
