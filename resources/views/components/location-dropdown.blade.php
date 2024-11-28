<div class="relative" x-data="{ open: false, selectedCity: '{{ request('location') }}' }">
    <input type="text"
           name="location"
           id="locationSearch"
           placeholder="Search by city"
           autocomplete="off"
           x-model="selectedCity"
           @focus="open = true"
           @click.away="open = false"
           class="w-full pl-12 pr-4 py-3 rounded-lg border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
    <svg class="w-6 h-6 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
    </svg>

    <!-- Cities Dropdown -->
    <div x-show="open"
         x-transition
         class="absolute z-50 w-full mt-1 bg-white rounded-lg shadow-lg border">
        @foreach($spanishCities as $city)
            <div class="city-option px-4 py-2 hover:bg-indigo-50 cursor-pointer"
                 @click="selectedCity = '{{ $city }}'; open = false">
                {{ $city }}
            </div>
        @endforeach
    </div>
</div>
