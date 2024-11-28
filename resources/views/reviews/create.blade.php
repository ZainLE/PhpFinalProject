<x-layouts.site>
    <x-slot name="hero">
        <div class="container mx-auto px-4 pt-20">
            <h1 class="text-white text-4xl md:text-5xl font-bold text-center mb-6">
                Review Your Experience
            </h1>
            <p class="text-indigo-100 text-center text-xl mb-12">
                {{ $booking->service->title }}
            </p>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 py-12">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <form action="{{ route('reviews.store', $booking) }}" method="POST">
                    @csrf

                    <!-- Rating -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                        <div class="flex space-x-2">
                            @for($i = 1; $i <= 5; $i++)
                                <label class="cursor-pointer">
                                    <input type="radio" name="rating" value="{{ $i }}" class="hidden peer" required>
                                    <svg class="w-8 h-8 text-gray-300 peer-checked:text-yellow-400"
                                         fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </label>
                            @endfor
                        </div>
                        @error('rating')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Comment -->
                    <div class="mb-6">
                        <label for="comment" class="block text-sm font-medium text-gray-700 mb-2">Your Review</label>
                        <textarea name="comment" id="comment" rows="4"
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                  required></textarea>
                        @error('comment')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit -->
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('bookings.show', $booking) }}"
                           class="px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-50">
                            Cancel
                        </a>
                        <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                            Submit Review
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.site> 
