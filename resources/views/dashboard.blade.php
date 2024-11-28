<x-app-layout>
    <!-- Hero Section with purple background -->
    <div class="bg-[#4E46DC] py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Content goes here -->
    </div>
</div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12">
        <!-- My Bookings Section -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <h2 class="text-2xl font-semibold text-blue-800 mb-4">My Bookings</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse(auth()->user()->bookings()->latest()->take(3)->get() as $booking)
                    <div class="border border-blue-100 rounded-lg p-4 hover:shadow-md transition duration-150 bg-blue-50">
                        <h3 class="font-semibold text-lg text-[#4F46E5]">{{ $booking->service->title }}</h3>
                        <p class="text-blue-600">{{ $booking->booking_date->format('F j, Y g:i A') }}</p>
                        <span class="inline-block px-2 py-1 text-sm rounded-full mt-2
                            @if($booking->status === 'confirmed') bg-green-100 text-green-800
                            @elseif($booking->status === 'pending') bg-yellow-100 text-yellow-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>
                @empty
                    <p class="text-blue-500">No bookings yet.</p>
                @endforelse
            </div>
        </div>

        <!-- My Reviews Section -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-semibold text-blue-800 mb-4">My Reviews</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse(auth()->user()->reviews()->latest()->take(3)->get() as $review)
                    <div class="border border-blue-100 rounded-lg p-4 hover:shadow-md transition duration-150 bg-blue-50">
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                @for($i = 0; $i < $review->rating; $i++)
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                        <p class="text-blue-600">{{ $review->comment }}</p>
                        <p class="text-sm text-[#4F46E5] mt-2">
                            For: {{ $review->booking->service->title }}
                        </p>
                    </div>
                @empty
                    <p class="text-blue-500">No reviews yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
