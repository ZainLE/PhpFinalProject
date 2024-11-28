<x-layouts.site>
    <x-slot name="title">
        Downwork
    </x-slot>

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
                        <div class="flex-1">
                            <div class="relative">
                                <input type="text"
                                       name="query"
                                       id="serviceSearch"
                                       placeholder="What service are you looking for?"
                                       autocomplete="off"
                                       class="w-full pl-12 pr-4 py-3 rounded-lg border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                <svg class="w-6 h-6 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>

                                <!-- Dropdown Menu -->
                                <div id="serviceDropdown" class="hidden absolute z-50 w-full mt-1 bg-white rounded-lg shadow-lg border">
                                    @foreach($services as $service)
                                        <a href="{{ route('services.show', $service) }}"
                                           class="block px-4 py-2 hover:bg-indigo-50 cursor-pointer">
                                            <div class="font-medium">{{ $service->title }}</div>
                                            <div class="text-sm text-gray-600">{{ $service->category }} • {{ $service->location }}</div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="flex-1">
                            <div class="relative">
                                <input type="text"
                                       name="location"
                                       id="locationSearch"
                                       placeholder="Search by city"
                                       autocomplete="off"
                                       value="{{ request('location') }}"
                                       class="w-full pl-12 pr-4 py-3 rounded-lg border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                <svg class="w-6 h-6 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                </svg>

                                <!-- Cities Dropdown -->
                                <div id="citiesDropdown" class="hidden absolute z-50 w-full mt-1 bg-white rounded-lg shadow-lg border">
                                    @foreach($spanishCities as $city)
                                        <div class="city-option px-4 py-2 hover:bg-indigo-50 cursor-pointer">
                                            {{ $city }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="bg-indigo-600 text-white px-8 py-3 rounded-lg hover:bg-indigo-700">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12">
        <!-- Service Categories -->
        <h2 class="text-3xl font-bold text-center mb-12">Browse by Category</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 mb-20">
            @foreach($categories as $category)
                <a href="{{ route('services.category', $category) }}"
                   class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="p-6">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                @switch(strtolower($category))
                                    @case('academic')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        @break
                                    @case('arts')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        @break
                                    @case('tech skills')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                        @break
                                    @case('languages')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                                        @break
                                    @case('business')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        @break
                                    @case('fitness')
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        @break
                                    @default
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                @endswitch
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">{{ $category }}</h3>
                    </div>
                </a>
            @endforeach
        </div>
<!--
        <!-- Service Providers Section -->
        {{--
        <div class="mt-20">
            <h2 class="text-3xl font-bold text-center mb-12">Featured Service Providers</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <!-- Provider Card Template (repeated for multiple providers) -->
                @foreach(range(1, 12) as $index)
                <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <div class="p-4">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 bg-indigo-100 rounded-full mr-3">
                                <img src="https://i.pravatar.cc/40?img={{ $index }}" alt="Provider" class="w-10 h-10 rounded-full object-cover">
                            </div>
                            <div>
                                <h3 class="text-md font-semibold">{{ ['Sarah Johnson', 'Michael Chen', 'Emma Wilson', 'James Brown', 'Lisa Anderson', 'David Kim', 'Maria Garcia', 'John Smith', 'Anna Lee', 'Robert Taylor', 'Sophie Martin', 'Alex Wong'][$index-1] }}</h3>
                                <p class="text-gray-600 text-xs">{{ ['Math Tutor', 'Piano Teacher', 'Fitness Trainer', 'Language Tutor', 'Business Coach', 'Coding Instructor', 'Art Teacher', 'Science Tutor', 'Dance Instructor', 'Career Coach', 'Yoga Instructor', 'Writing Tutor'][$index-1] }}</p>
                            </div>
                        </div>
                        <p class="text-gray-700 text-sm mb-3 line-clamp-2">
                            {{ ['Experienced math tutor specializing in calculus and algebra.',
                                'Professional pianist offering lessons for all skill levels.',
                                'Certified personal trainer with 5+ years experience.',
                                'Native Spanish speaker teaching beginners to advanced.',
                                'MBA with expertise in startup consulting.',
                                'Full-stack developer teaching web development.',
                                'Professional artist offering painting classes.',
                                'PhD student teaching physics and chemistry.',
                                'Former professional dancer teaching ballet.',
                                'HR professional offering career guidance.',
                                'RYT-500 certified yoga instructor.',
                                'Published author teaching creative writing.'][$index-1] }}
                        </p>
                        <dl class="text-xs font-medium flex items-center justify-between">
                            <dd class="text-indigo-600 flex items-center">
                                <svg width="16" height="16" fill="none" class="mr-1">
                                    <path d="m8 3 1.5 3.5h3.5l-3 2.5 1 4L8 11l-3 2.5 1-4-3-2.5h3.5L8 3z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span>{{ number_format(4 + (rand(0, 10) / 10), 1) }} <span class="text-slate-400 font-normal">({{ rand(50, 200) }})</span></span>
                            </dd>
                            <dd class="flex items-center text-slate-500">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                </svg>
                                {{ ['San Francisco', 'New York', 'Los Angeles', 'Chicago', 'Boston', 'Seattle', 'Austin', 'Miami', 'Denver', 'Portland', 'Atlanta', 'San Diego'][$index-1] }}
                            </dd>
                        </dl>
                        <button class="w-full bg-indigo-600 text-white text-xs font-medium py-2 px-3 rounded-lg hover:bg-indigo-700 mt-3">
                            Contact Provider
                        </button>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center items-center space-x-2 mt-12">
                <button class="px-4 py-2 border rounded-lg hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                    Previous
                </button>
                <div class="flex space-x-2">
                    <button class="px-4 py-2 border rounded-lg bg-indigo-600 text-white">1</button>
                    <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">2</button>
                    <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">3</button>
                    <span class="px-4 py-2">...</span>
                    <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">10</button>
                </div>
                <button class="px-4 py-2 border rounded-lg hover:bg-gray-50">
                    Next
                </button>
            </div>
        </div>
    </div>
    --}}
</x-layouts.site>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('serviceSearch');
    const dropdown = document.getElementById('serviceDropdown');
    const dropdownItems = dropdown.querySelectorAll('a');

    // Show dropdown when input is focused
    searchInput.addEventListener('focus', function() {
        dropdown.classList.remove('hidden');
    });

    // Filter items as user types
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();

        dropdownItems.forEach(item => {
            const text = item.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                item.classList.remove('hidden');
            } else {
                item.classList.add('hidden');
            }
        });
    });

    // Hide dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });

    // Location search functionality
    const locationInput = document.getElementById('locationSearch');
    const citiesDropdown = document.getElementById('citiesDropdown');
    const cityOptions = citiesDropdown.querySelectorAll('.city-option');

    // Show dropdown when input is focused
    locationInput.addEventListener('focus', function() {
        citiesDropdown.classList.remove('hidden');
    });

    // Filter cities as user types
    locationInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();

        cityOptions.forEach(option => {
            const text = option.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                option.classList.remove('hidden');
            } else {
                option.classList.add('hidden');
            }
        });
    });

    // Select city when clicked
    cityOptions.forEach(option => {
        option.addEventListener('click', function() {
            locationInput.value = this.textContent.trim();
            citiesDropdown.classList.add('hidden');
        });
    });

    // Hide dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!locationInput.contains(e.target) && !citiesDropdown.contains(e.target)) {
            citiesDropdown.classList.add('hidden');
        }
    });
});
</script>
