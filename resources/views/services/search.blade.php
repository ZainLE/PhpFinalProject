<x-layouts.site>
    <x-slot name="hero">
        <div class="container mx-auto px-4 pt-20">
            <h1 class="text-white text-4xl md:text-5xl font-bold text-center mb-6">
                Search Results
            </h1>
            <p class="text-indigo-100 text-center text-xl mb-12">
                @if($query && $location)
                    Results for "{{ $query }}" in {{ $location }}
                @elseif($query)
                    Results for "{{ $query }}"
                @elseif($location)
                    Services in {{ $location }}
                @else
                    All Services
                @endif
            </p>

            <!-- Search Form -->
            <div class="max-w-4xl mx-auto">
                <form action="{{ route('services.search') }}" method="GET" class="bg-white p-4 rounded-lg shadow-lg">
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="flex-1">
                            <input type="text"
                                   name="query"
                                   value="{{ $query }}"
                                   placeholder="What service are you looking for?"
                                   class="w-full pl-4 pr-4 py-3 rounded-lg border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                        </div>
                        <div class="flex-1">
                            <input type="text"
                                   name="location"
                                   value="{{ $location }}"
                                   placeholder="Location"
                                   class="w-full pl-4 pr-4 py-3 rounded-lg border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                        </div>
                        <button type="submit"
                                class="bg-indigo-600 text-white px-8 py-3 rounded-lg hover:bg-indigo-700">
                            Search
                        </button>
                    </div>
                </form>
            </div>
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
                <div class="col-span-full text-center py-12">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">No services found</h3>
                    <p class="text-gray-600">Try adjusting your search criteria</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $services->links() }}
        </div>
    </div>
</x-layouts.site>
