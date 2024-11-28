<x-layouts.site>
    <div class="min-h-screen bg-gray-100 py-12">
        <div class="max-w-md mx-auto">
            <!-- Success Animation -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="p-8">
                    <div class="mb-8 text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Booking Confirmed!</h2>
                    </div>

                    <!-- Booking Details -->
                    <div class="space-y-6">
                        <div class="flex items-center justify-between pb-4 border-b">
                            <div class="flex items-center space-x-4">
                                <img src="https://i.pravatar.cc/48?u={{ $booking->service->user_id }}"
                                     alt="{{ $booking->service->user->name }}"
                                     class="w-12 h-12 rounded-full">
                                <div>
                                    <h3 class="font-semibold">{{ $booking->service->title }}</h3>
                                    <p class="text-sm text-gray-500">with {{ $booking->service->user->name }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Date & Time -->
                        <div class="flex justify-between items-center">
                            <div class="text-gray-600">Date & Time</div>
                            <div class="font-semibold">
                                {{ Carbon\Carbon::parse($booking->booking_date)->format('D, M j, Y') }}
                                <br>
                                {{ Carbon\Carbon::parse($booking->booking_date)->format('g:i A') }}
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="flex justify-between items-center">
                            <div class="text-gray-600">Price</div>
                            <div class="font-semibold">${{ number_format($booking->service->price, 2) }}</div>
                        </div>

                        <!-- Booking ID -->
                        <div class="flex justify-between items-center text-sm">
                            <div class="text-gray-500">Booking ID</div>
                            <div class="font-mono text-gray-600">#{{ str_pad($booking->id, 8, '0', STR_PAD_LEFT) }}</div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="mt-8 space-y-4">
                        <a href="{{ route('bookings.show', $booking) }}"
                           class="block w-full bg-indigo-600 text-white text-center py-3 rounded-lg font-semibold hover:bg-indigo-700">
                            View Booking Details
                        </a>
                        <a href="{{ route('services.index') }}"
                           class="block w-full bg-gray-100 text-gray-700 text-center py-3 rounded-lg font-semibold hover:bg-gray-200">
                            Browse More Services
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.site> 
