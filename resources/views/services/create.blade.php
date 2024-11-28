<x-layouts.site>
    <x-slot name="hero">
        <div class="container mx-auto px-4 pt-20">
            <h1 class="text-white text-4xl md:text-5xl font-bold text-center mb-6">
                Create a New Service
            </h1>
            <p class="text-indigo-100 text-center text-xl mb-12">
                Share your skills with the world
            </p>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 py-12">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <form action="{{ route('services.store') }}" method="POST">
                    @csrf
                    <x-forms.service-form />

                    <div class="mt-6 flex justify-end">
                        <a href="{{ route('services.index') }}"
                           class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg mr-4 hover:bg-gray-200">
                            Cancel
                        </a>
                        <button type="submit"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                            Create Service
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.site>
