<x-layouts.site>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-2xl font-bold mb-6">Edit Booking for {{ $service->title }}</h1>

            <form method="POST" action="{{ route('bookings.update', $booking) }}">
                @csrf
                @method('PUT')

                <!-- Date Selection -->
                <input type="hidden" name="date" value="{{ $selectedDate }}">

                <!-- Time Slots -->
                <div class="grid grid-cols-3 gap-4 mb-6">
                    @foreach($timeSlots as $slot)
                        <div class="relative">
                            <input type="radio"
                                   name="time"
                                   id="time_{{ $slot['time'] }}"
                                   value="{{ $slot['time'] }}"
                                   {{ $slot['selected'] ? 'checked' : '' }}
                                   {{ !$slot['available'] && !$slot['selected'] ? 'disabled' : '' }}
                                   class="peer hidden">
                            <label for="time_{{ $slot['time'] }}"
                                   class="block p-4 text-center rounded-lg border
                                          {{ (!$slot['available'] && !$slot['selected'])
                                             ? 'bg-gray-100 text-gray-400 cursor-not-allowed'
                                             : 'cursor-pointer peer-checked:border-indigo-600 peer-checked:bg-indigo-50 hover:border-indigo-600' }}">
                                {{ $slot['formatted'] }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <!-- Notes -->
                <div class="mb-6">
                    <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Notes (Optional)</label>
                    <textarea id="notes"
                              name="notes"
                              rows="4"
                              class="w-full rounded-lg border-gray-300">{{ $booking->notes }}</textarea>
                </div>

                <div class="flex justify-between">
                    <button type="submit"
                            class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">
                        Update Booking
                    </button>

                    <button type="button"
                            onclick="document.getElementById('delete-form').submit()"
                            class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">
                        Cancel Booking
                    </button>
                </div>
            </form>

            <!-- Delete Form -->
            <form id="delete-form"
                  method="POST"
                  action="{{ route('bookings.destroy', $booking) }}"
                  class="hidden">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</x-layouts.site> 
