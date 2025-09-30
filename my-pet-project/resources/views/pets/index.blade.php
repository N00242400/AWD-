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
                    <h3 class="font-semibold text-lg mb-4">"List Of Pets"</h3>
                    <div class ="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($pets as $pet)
                        <a href="{{ route ('pets.show',$pet) }}">
                    <x-pet-card
                    :name="$pet->name"
                    :breed="$pet->breed"
                    :age="$pet->age"
                    :description="$pet->description"
                    :image="$pet->image"
                />
</a>
@endforeach
                </div>
            </div>
        </div>
    </div>  
</x-app-layout>