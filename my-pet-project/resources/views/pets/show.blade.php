<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Pets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg mb-4">Pet Details</h3>
                    <x-pet-details
                    :name="$pet->name"
                    :age="$pet->age"
                    :species="$pet->species"
                    :description="$pet->description"
                    :image="$pet->image"
                />
                </div>
            </div>
        </div>
    </div>  
</x-app-layout>