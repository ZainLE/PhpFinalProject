<x-layouts.site>
    <x-slot name="hero">
        <div class="container mx-auto px-4 pt-20">
            <h1 class="text-white text-4xl md:text-5xl font-bold text-center mb-6">
                {{ $service->title }}
            </h1>
            <p class="text-indigo-100 text-center text-xl mb-12">
                {{ $service->category }}
            </p>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <!-- Provider Info -->
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full mr-4">
                        <img src="https://i.pravatar.cc/64?u={{ $service->user_id }}"
                             alt="{{ $service->user->name }}"
                             class="w-16 h-16 rounded-full object-cover">
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold">{{ $service->user->name }}</h2>
                        <p class="text-gray-600">Service Provider</p>
                    </div>
                </div>

                <!-- Service Details -->
                <div class="prose max-w-none mb-6">
                    <h3 class="text-lg font-semibold mb-2">About This Service</h3>
                    <p>{{ $service->description }}</p>
                </div>

                <!-- Booking Section -->
                @if(auth()->id() !== $service->user_id)
                    <div class="mt-6">
                        <a href="{{ route('bookings.create', $service) }}"
                           class="block w-full bg-indigo-600 text-white text-center py-3 rounded-lg hover:bg-indigo-700">
                            Book Now
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.site>
