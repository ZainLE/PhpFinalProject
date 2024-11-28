<x-layouts.site>
    <x-slot name="hero">
        <div class="container mx-auto px-4 pt-20">
            <h1 class="text-white text-4xl md:text-5xl font-bold text-center mb-6">
                Browse Available Services
            </h1>
            <p class="text-indigo-100 text-center text-xl mb-12">
                Find trusted service providers in your area
            </p>

            <!-- Search Form -->
            <div class="max-w-4xl mx-auto">
                <form action="{{ route('services.search') }}" method="GET" class="bg-white p-4 rounded-lg shadow-lg">
                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Search Input with Dropdown -->
                        <div class="flex-1">
                            <x-search-dropdown :searchSuggestions="$searchSuggestions" />
                        </div>

                        <!-- Location Dropdown -->
                        <div class="flex-1">
                            <x-location-dropdown :spanishCities="$spanishCities" />
                        </div>

                        <button type="submit" class="bg-indigo-600 text-white px-8 py-3 rounded-lg hover:bg-indigo-700 transition-colors">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 py-12">
        <!-- Service Categories -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-center mb-12">Browse by Category</h2>
            <!-- Category List -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
                @foreach($categoryList as $category)
                    <a href="{{ route('services.category', $category) }}"
                       class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <div class="p-4">
                            <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mb-3">
                                @if(view()->exists('components.icons.' . Str::slug($category)))
                                    <x-dynamic-component
                                        :component="'icons.' . Str::slug($category)"
                                        class="w-5 h-5 text-indigo-600"
                                    />
                                @else
                                    <svg class="w-5 h-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                @endif
                            </div>
                            <h3 class="text-lg font-semibold mb-1">{{ $category }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Services List -->
        <div class="mt-20">
            <h2 class="text-3xl font-bold text-center mb-12">Available Services</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($services as $service)
                    <x-service-card :service="$service" />
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $services->links() }}
            </div>
        </div>
    </div>
</x-layouts.site>
