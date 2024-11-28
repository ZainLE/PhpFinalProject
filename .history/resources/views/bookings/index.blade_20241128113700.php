@php
    use Carbon\Carbon;
@endphp

<x-layouts.site>
    <x-slot name="hero">
        <div class="container mx-auto px-4 pt-20">
            <h1 class="text-white text-4xl md:text-5xl font-bold text-center mb-6">
                My Bookings
            </h1>
            <p class="text-indigo-100 text-center text-xl mb-12">
                Manage your service bookings
            </p>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            <!-- Tabs -->
            <div class="border-b border-gray-200 mb-8">
                <nav class="-mb-px flex space-x-8">
                    <a href="#" class="border-indigo-500 text-indigo-600 whitespace-nowrap pb-4 px-1 border-b-2 font-medium">
                        All Bookings
                    </a>
                </nav>
            </div>

            <!-- Bookings List -->
            <div class="space-y-6">
                @forelse($bookings as $booking)
                    <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-indigo-100 rounded-full">
                                    <img src="https://i.pravatar.cc/48?u={{ $booking->service->user_id }}"
                                         alt="{{ $booking->service->user->name }}"
                                         class="w-12 h-12 rounded-full object-cover">
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold">{{ $booking->service->title }}</h3>
                                    <p class="text-gray-600">with {{ $booking->service->user->name }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    @if($booking->status === 'completed') bg-green-100 text-green-800
                                    @elseif($booking->status === 'cancelled') bg-red-100 text-red-800
                                    @else bg-blue-100 text-blue-800
                                    @endif">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </div>
                        </div>

                        <div class="mt-4 flex items-center justify-between text-sm">
                            <div class="text-gray-600">
                                @if($booking->booking_date)
                                    {{ $booking->booking_date->format('l, F j, Y \a\t g:i A') }}
                                @else
                                    Date not set
                                @endif
                            </div>
                            <div>
                                <a href="{{ route('bookings.show', $booking) }}"
                                   class="text-indigo-600 hover:text-indigo-900">
                                    View Details →
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12">
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No bookings yet</h3>
                        <p class="text-gray-600 mb-6">Start by browsing available services</p>
                        <a href="{{ route('services.index') }}"
                           class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                            Browse Services
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
</x-layouts.site>
