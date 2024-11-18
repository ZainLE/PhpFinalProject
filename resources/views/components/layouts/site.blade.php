<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'Downwork' }}</title>
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
                        <a href="#" class="bg-white text-indigo-600 px-4 py-2 rounded-lg hover:bg-indigo-50">Sign Up</a>
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
            {{ $hero ?? '' }}
        </div>

        <!-- Main Content -->
        <main>
            {{ $slot }}
        </main>
    </body>
</html>
