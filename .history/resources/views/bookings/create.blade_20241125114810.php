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
                <form action="{{ route('bookings.store', $service) }}" method="POST">
                    @csrf

                    <!-- Date Selection -->
                    <div class="mb-6">
                        <label for="booking_date" class="block text-sm font-medium text-gray-700 mb-2">
                            Select Date and Time
                        </label>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach($availableSlots as $slot)
                                <div class="relative">
                                    <input type="radio"
                                           id="slot_{{ $slot->timestamp }}"
                                           name="booking_date"
                                           value="{{ $slot->format('Y-m-d H:i:s') }}"
                                           class="peer hidden"
                                           required>
                                    <label for="slot_{{ $slot->timestamp }}"
                                           class="block w-full p-4 bg-white border rounded-lg text-center cursor-pointer
                                                  peer-checked:border-indigo-600 peer-checked:bg-indigo-50">
                                        <div class="text-sm font-semibold">{{ $slot->format('D, M j') }}</div>
                                        <div class="text-gray-600">{{ $slot->format('g:i A') }}</div>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('booking_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Notes -->
                    <div class="mb-6">
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">
                            Additional Notes
                        </label>
                        <textarea name="notes"
                                  id="notes"
                                  rows="3"
                                  class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                  placeholder="Any special requests or information for the service provider?"></textarea>
                        @error('notes')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('services.show', $service) }}"
                           class="px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-50">
                            Cancel
                        </a>
                        <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                            Confirm Booking
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.site>
