<div class="relative" x-data="{ open: false, searchQuery: '{{ request('query') }}' }">
    <input type="text"
           name="query"
           placeholder="What service are you looking for?"
           x-model="searchQuery"
           @focus="open = true"
           @click.away="open = false"
           class="w-full pl-12 pr-4 py-3 rounded-lg border focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500">
    <svg class="w-6 h-6 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
    </svg>

    <!-- Search Suggestions Dropdown -->
    <div x-show="open && searchQuery.length > 0"
         x-transition
         class="absolute z-50 w-full mt-1 bg-white rounded-lg shadow-lg border">
        @foreach($searchSuggestions as $category => $services)
            @foreach($services as $service)
                <div class="search-option px-4 py-2 hover:bg-indigo-50 cursor-pointer"
                     @click="searchQuery = '{{ $service }}'; open = false">
                    <div class="flex items-center">
                        <span class="text-gray-600">{{ $service }}</span>
                        <span class="ml-auto text-sm text-gray-400">{{ $category }}</span>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>
