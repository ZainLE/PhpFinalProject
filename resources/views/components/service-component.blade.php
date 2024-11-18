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

            <!-- Search Section -->
            <div class="max-w-4xl mx-auto">
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Service Search -->
                        <div class="flex-1">
                            <div class="relative">
                                <input type="text"
                                       placeholder="What service are you looking for?"
                                       class="w-full pl-12 pr-4 py-3 rounded-lg border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                <svg class="w-6 h-6 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                        </div>

                        <!-- Location Search -->
                        <div class="flex-1">
                            <div class="relative">
                                <input type="text"
                                       placeholder="Location"
                                       class="w-full pl-12 pr-10 py-3 rounded-lg border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
                                <svg class="w-6 h-6 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <button class="absolute right-3 top-3 text-indigo-600 hover:text-indigo-800">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Search Button -->
                        <button class="bg-indigo-600 text-white px-8 py-3 rounded-lg hover:bg-indigo-700 transition-colors">
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12">
        <!-- Service Categories -->
        <h2 class="text-3xl font-bold text-center mb-12">Browse by Category</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
            <!-- Academic Services -->
            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <div class="p-4">
                    <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-1">Academic</h3>
                    <p class="text-gray-600 text-sm">Tutoring & Test Prep</p>
                </div>
            </div>

            <!-- Creative Arts -->
            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <div class="p-4">
                    <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-1">Arts</h3>
                    <p class="text-gray-600 text-sm">Music & Dance</p>
                </div>
            </div>

            <!-- Fitness -->
            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <div class="p-4">
                    <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-1">Fitness</h3>
                    <p class="text-gray-600 text-sm">Personal Training</p>
                </div>
            </div>

            <!-- Technology -->
            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <div class="p-4">
                    <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-1">Tech</h3>
                    <p class="text-gray-600 text-sm">Coding & IT</p>
                </div>
            </div>

            <!-- Languages -->
            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <div class="p-4">
                    <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-1">Languages</h3>
                    <p class="text-gray-600 text-sm">Language Learning</p>
                </div>
            </div>

            <!-- Business -->
            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <div class="p-4">
                    <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-1">Business</h3>
                    <p class="text-gray-600 text-sm">Consulting</p>
                </div>
            </div>

            <!-- And more categories... -->
        </div>

        <!-- Service Providers Section -->
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
</x-layouts.site>
