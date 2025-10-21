<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Edit Pet:</h3>
                    
                    {{-- Using the PetForm component for pet editing --}}
                    <x-pet-form
                        :action="route('pets.update', $pet)"
                        :method="'PUT'"
                        :pet="$pet"
                    />

                    <div class="mt-6">
                        <a href="{{ route('pets.show', $pet) }}"
                        class="py-2.5 px-5 text-sm font-medium text-white bg-red-500 rounded-full border border-gray-200 
                        hover:bg-red-600 focus:z-10 focus:ring-4 focus:ring-red-100 transition">
                           Cancel
                        </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

