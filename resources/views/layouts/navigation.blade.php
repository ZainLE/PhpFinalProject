<nav x-data="{ open: false }" class="bg-[#4F46E5] border-b border-[#4F46E5]">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('services.index') }}" class="text-2xl font-bold text-white hover:text-gray-200 transition duration-150">
                        Downwork
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-16 sm:flex">
                    <x-nav-link :href="route('services.index')" :active="request()->routeIs('services.index')"
                        class="text-white hover:text-gray-200 px-4 py-2 rounded-md text-sm font-medium transition duration-150">
                        {{ __('Find Services') }}
                    </x-nav-link>
                    <x-nav-link :href="route('bookings.index')" :active="request()->routeIs('bookings.index')"
                        class="text-white hover:text-gray-200 px-4 py-2 rounded-md text-sm font-medium transition duration-150">
                        {{ __('My Bookings') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white hover:text-gray-200 focus:outline-none transition duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-2">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                            <x-dropdown-link :href="route('profile.edit')"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#4F46E5] hover:text-white transition duration-150">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#4F46E5] hover:text-white transition duration-150">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
