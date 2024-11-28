@props(['service' => null])

<div class="space-y-6">
    <!-- Title -->
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">Service Title</label>
        <input type="text"
               name="title"
               id="title"
               value="{{ old('title', $service?->title) }}"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
               required>
        @error('title')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Category -->
    <div>
        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
        <select name="category"
                id="category"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                required>
            <option value="">Select a category</option>
            @php
                $categories = ['Academic', 'Arts', 'Tech Skills', 'Languages', 'Business', 'Fitness'];
            @endphp
            @foreach($categories as $category)
                <option value="{{ $category }}" {{ old('category', $service?->category) === $category ? 'selected' : '' }}>
                    {{ $category }}
                </option>
            @endforeach
        </select>
        @error('category')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Description -->
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description"
                  id="description"
                  rows="4"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                  required>{{ old('description', $service?->description) }}</textarea>
        @error('description')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Price -->
    <div>
        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
        <div class="relative mt-1 rounded-md shadow-sm">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <span class="text-gray-500 sm:text-sm">$</span>
            </div>
            <input type="number"
                   name="price"
                   id="price"
                   step="0.01"
                   value="{{ old('price', $service?->price) }}"
                   class="block w-full rounded-md border-gray-300 pl-7 focus:border-indigo-500 focus:ring-indigo-500"
                   required>
        </div>
        @error('price')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Location -->
    <div>
        <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
        <input type="text"
               name="location"
               id="location"
               value="{{ old('location', $service?->location) }}"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
               required>
        @error('location')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    @if($service)
        <!-- Is Active -->
        <div class="flex items-center">
            <input type="checkbox"
                   name="is_active"
                   id="is_active"
                   value="1"
                   {{ old('is_active', $service->is_active) ? 'checked' : '' }}
                   class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
            <label for="is_active" class="ml-2 block text-sm text-gray-700">Service is active</label>
        </div>
    @endif
</div> 
