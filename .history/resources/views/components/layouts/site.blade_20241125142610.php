<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'Downwork' }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="antialiased bg-gray-50">
        <!-- Hero Section with Search -->
        <div class="relative bg-indigo-600 h-[500px]">
            <!-- Navigation -->
            <nav class="container mx-auto px-4 py-6">
                <div class="flex justify-between items-center">
                    <a href="{{ route('home') }}" class="text-white text-2xl font-bold">Downwork</a>

                    <div class="hidden md:flex space-x-8">
                        <a href="{{ route('services.index') }}" class="text-white hover:text-indigo-200">Find Services</a>
                        <a href="{{ route('services.create') }}" class="text-white hover:text-indigo-200">Become a Provider</a>
                        <!-- <a href="#" class="text-white hover:text-indigo-200">How it Works</a> -->

                        @auth
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="text-white hover:text-indigo-200 flex items-center">
                                    {{ Auth::user()->name }}
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <!-- Dropdown Menu -->
                                <div x-show="open"
                                     @click.away="open = false"
                                     class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                                    <a href="{{ route('bookings.index') }}"
                                       class="block px-4 py-2 text-gray-800 hover:bg-indigo-50">
                                        My Bookings
                                    </a>
                                    <a href="{{ route('profile.edit') }}"
                                       class="block px-4 py-2 text-gray-800 hover:bg-indigo-50">
                                        Profile
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                                class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-indigo-50">
                                            Sign Out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="text-white hover:text-indigo-200">Sign In</a>
                            <a href="{{ route('register') }}" class="bg-white text-indigo-600 px-4 py-2 rounded-lg hover:bg-indigo-50">
                                Sign Up
                            </a>
                        @endauth
                    </div>

                    <!-- Mobile Menu Button -->
                    <button class="md:hidden text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                        </svg>
                    </button>
                </div>
            </nav>

            <!-- Hero Content -->
            {{ $hero ?? '' }}
        </div>

        <!-- Main Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Add this before closing body tag -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Location dropdown functionality
                const locationInput = document.getElementById('locationSearch');
                const citiesDropdown = document.getElementById('citiesDropdown');
                const cityOptions = document.querySelectorAll('.city-option');

                if (locationInput && citiesDropdown) {
                    locationInput.addEventListener('focus', () => {
                        citiesDropdown.classList.remove('hidden');
                    });

                    document.addEventListener('click', (e) => {
                        if (!locationInput.contains(e.target) && !citiesDropdown.contains(e.target)) {
                            citiesDropdown.classList.add('hidden');
                        }
                    });

                    cityOptions.forEach(option => {
                        option.addEventListener('click', () => {
                            locationInput.value = option.textContent.trim();
                            citiesDropdown.classList.add('hidden');
                        });
                    });

                    // Filter cities based on input
                    locationInput.addEventListener('input', (e) => {
                        const searchText = e.target.value.toLowerCase();
                        cityOptions.forEach(option => {
                            const cityName = option.textContent.trim().toLowerCase();
                            if (cityName.includes(searchText)) {
                                option.style.display = 'block';
                            } else {
                                option.style.display = 'none';
                            }
                        });
                    });
                }

                // Search suggestions functionality (if needed)
                const searchInput = document.querySelector('input[name="query"]');
                if (searchInput) {
                    // Add your search suggestions logic here
                }
            });
        </script>
    </body>
</html>
