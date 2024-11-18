<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Find Local Services</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-50">
        <!-- Hero Section with Search -->
        <div class="relative bg-indigo-600 h-[500px]">
            <!-- Navigation -->
            <nav class="container mx-auto px-4 py-6">
                <div class="flex justify-between items-center">
                    <div class="text-white text-2xl font-bold">Downwork</div>
                    <div class="hidden md:flex space-x-8">
                        <a href="#" class="text-white hover:text-indigo-200">Find Services</a>
                        <a href="#" class="text-white hover:text-indigo-200">Become a Provider</a>
                        <a href="#" class="text-white hover:text-indigo-200">How it Works</a>
                        <a href="#" class="text-white hover:text-indigo-200">Sign In</a>
                        <a href="#" class="bg-white text-indigo-600 px-4 py-2 hsfhjfkjsfhksjnded-lg hover:bg-indigo-50">Sign Up</a>
                    </div>
                    <!-- Mobile Menu Button -->
                    <button class="md:hidden text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </nav>

            <!-- Hero Content -->
            <div class="container mx-auto px-4 pt-20">
                <h1 class="text-white text-4xl md:text-5xl font-bold text-center mb-6">
                    Find Local Services Near You
                </h1>
                <p class="text-indigo-100 text-center text-xl mb-12">
                    Connect with trusted service providers in your area
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
        </div>

        <!-- Main Content -->
        <div class="container mx-auto px-4 py-12">
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row justify-center gap-4 mb-16">
                <a href="#" class="bg-indigo-600 text-white px-8 py-3 rounded-lg hover:bg-indigo-700 text-center">
                    Browse Services
                </a>
                <a href="#" class="bg-white text-indigo-600 px-8 py-3 rounded-lg border-2 border-indigo-600 hover:bg-indigo-50 text-center">
                    Post Your Service
                </a>
            </div>

            <!-- Featured Categories -->
            <h2 class="text-3xl font-bold text-center mb-12">Popular Categories</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Academic Services -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="p-6">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Academic</h3>
                        <p class="text-gray-600">Tutoring, Test Prep, Academic Writing</p>
                    </div>
                </div>

                <!-- Creative Arts -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="p-6">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Creative Arts</h3>
                        <p class="text-gray-600">Music, Art, Dance, Photography</p>
                    </div>
                </div>

                <!-- Fitness & Wellness -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="p-6">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Fitness & Wellness</h3>
                        <p class="text-gray-600">Personal Training, Yoga, Nutrition</p>
                    </div>
                </div>

                <!-- Tech Skills -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="p-6">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Tech Skills</h3>
                        <p class="text-gray-600">Coding, Web Design, Digital Marketing</p>
                    </div>
                </div>

                <!-- Language Learning -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="p-6">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Languages</h3>
                        <p class="text-gray-600">ESL, Foreign Languages, Translation</p>
                    </div>
                </div>

                <!-- Business Skills -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="p-6">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Business</h3>
                        <p class="text-gray-600">Consulting, Coaching, Financial Planning</p>
                    </div>
                </div>

                <!-- Home Services -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="p-6">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Home Services</h3>
                        <p class="text-gray-600">Cleaning, Repairs, Interior Design</p>
                    </div>
                </div>

                <!-- Events & Entertainment -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="p-6">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Events</h3>
                        <p class="text-gray-600">Party Planning, DJs, Entertainment</p>
                    </div>
                </div>
            </div>

            <!-- Additional Features Section -->
            <div class="mt-20">
                <h2 class="text-3xl font-bold text-center mb-12">Why Choose Downwork</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Verified Providers</h3>
                        <p class="text-gray-600">All service providers are thoroughly vetted and reviewed</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Book Instantly</h3>
                        <p class="text-gray-600">Schedule services at your convenience, 24/7</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Secure Messaging</h3>
                        <p class="text-gray-600">Communicate safely through our platform</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
