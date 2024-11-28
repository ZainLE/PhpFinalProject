<x-layouts.site>
    <x-slot name="hero">
        <div class="container mx-auto px-4 pt-20">
            <h1 class="text-white text-4xl md:text-5xl font-bold text-center mb-6">
                {{ $category }}
            </h1>
            <p class="text-indigo-100 text-center text-xl mb-12">
                Browse all services in {{ $category }}
            </p>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse($services as $service)
                <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <div class="p-4">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 bg-indigo-100 rounded-full mr-3">
                                <img src="https://i.pravatar.cc/40?u={{ $service->user_id }}"
                                     alt="{{ $service->user->name }}"
                                     class="w-10 h-10 rounded-full object-cover">
                            </div>
                            <div>
                                <h3 class="text-md font-semibold">{{ $service->user->name }}</h3>
                                <p class="text-gray-600 text-xs">{{ $service->category }}</p>
                            </div>
                        </div>
                        <h4 class="font-semibold mb-2">{{ $service->title }}</h4>
                        <p class="text-gray-700 text-sm mb-3 line-clamp-2">
                            {{ $service->description }}
                        </p>
                        <dl class="text-xs font-medium flex items-center justify-between">
                            <dd class="text-indigo-600">${{ number_format($service->price, 2) }}</dd>
                            <dd class="text-slate-500">{{ $service->location }}</dd>
                        </dl>
                        <a href="{{ route('services.show', $service) }}"
                           class="block w-full bg-indigo-600 text-white text-center text-sm font-medium py-2 px-3 rounded-lg hover:bg-indigo-700 mt-3">
                            View Details
                        </a>
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">No services found in this category</h3>
                    <p class="text-gray-600">There are currently no services available in {{ $category }}</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $services->links() }}
        </div>
    </div>
</x-layouts.site>
