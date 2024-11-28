<x-layouts.site>
    <x-slot name="hero">
        <div class="container mx-auto px-4 pt-20">
            <h1 class="text-white text-4xl md:text-5xl font-bold text-center mb-6">
                Booking Details
            </h1>
            <p class="text-indigo-100 text-center text-xl mb-12">
                Booking #{{ str_pad($booking->id, 8, '0', STR_PAD_LEFT) }}
            </p>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 py-12">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <!-- Status Banner -->
                <div class="bg-green-500 text-white px-6 py-4">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="font-semibold">{{ ucfirst($booking->status) }}</span>
                    </div>
                </div>

                <div class="p-6">
                    <!-- Service Details -->
                    <div class="mb-8">
                        <div class="flex items-center mb-4">
                            <img src="https://i.pravatar.cc/48?u={{ $booking->service->user_id }}"
                                 alt="{{ $booking->service->user->name }}"
                                 class="w-12 h-12 rounded-full mr-4">
                            <div>
                                <h3 class="font-semibold text-lg">{{ $booking->service->title }}</h3>
                                <p class="text-gray-600">with {{ $booking->service->user->name }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Information -->
                    <div class="space-y-6 border-t pt-6">
                        <!-- Date & Time -->
                        <div class="flex justify-between items-center">
                            <div class="text-gray-600">Date & Time</div>
                            <div class="font-semibold">
                                {{ Carbon\Carbon::parse($booking->booking_date)->format('D, M j, Y g:i A') }}
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="flex justify-between items-center">
                            <div class="text-gray-600">Location</div>
                            <div class="font-semibold">{{ $booking->service->location }}</div>
                        </div>

                        <!-- Price -->
                        <div class="flex justify-between items-center">
                            <div class="text-gray-600">Price</div>
                            <div class="font-semibold">${{ number_format($booking->service->price, 2) }}</div>
                        </div>

                        @if($booking->notes)
                            <!-- Notes -->
                            <div class="border-t pt-6">
                                <h4 class="font-semibold mb-2">Additional Notes</h4>
                                <p class="text-gray-600">{{ $booking->notes }}</p>
                            </div>
                        @endif
                    </div>

                    <!-- Actions -->
                    <div class="mt-8 space-y-4">
                        <a href="{{ route('services.show', $booking->service) }}"
                           class="block w-full bg-gray-100 text-gray-700 text-center py-3 rounded-lg font-semibold hover:bg-gray-200">
                            View Service Details
                        </a>
                        @if($booking->status === 'pending')
                            <form action="{{ route('bookings.update', $booking) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" name="status" value="confirmed"
                                        class="block w-full bg-green-500 text-white text-center py-3 rounded-lg font-semibold hover:bg-green-600">
                                    Confirm Booking
                                </button>
                            </form>
                            <form action="{{ route('bookings.update', $booking) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" name="status" value="cancelled"
                                        class="block w-full bg-red-500 text-white text-center py-3 rounded-lg font-semibold hover:bg-red-600">
                                    Cancel Booking
                                </button>
                            </form>
                        @elseif($booking->status === 'completed' && !$booking->review)
                            <a href="{{ route('reviews.create', $booking) }}"
                               class="block w-full bg-green-600 text-white text-center py-3 rounded-lg font-semibold hover:bg-green-700">
                                Leave a Review
                            </a>
                        @elseif($booking->review)
                            <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                                <h4 class="font-semibold mb-2">Your Review</h4>
                                <div class="flex items-center mb-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-5 h-5 {{ $i <= $booking->review->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                             fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @endfor
                                </div>
                                <p class="text-gray-600">{{ $booking->review->comment }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.site>
