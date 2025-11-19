<x-app-layout>
    <!-- Success Alert -->
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="flex flex-col md:flex-row max-w-7xl mx-auto gap-8 py-12">
        
        <!-- Owner Section -->
        <div class="w-full md:w-1/3 bg-white rounded-xl p-6 flex flex-col items-center">
            <img 
                src="{{ asset('images/' . $owner->image) }}" 
                alt="{{ $owner->name }}" 
                class="w-64 h-64 rounded-full object-cover shadow-lg mb-6"
            >

            <h2 class="text-2xl font-bold text-gray-900 mb-2 text-center">{{ $owner->name }}</h2>
            <p class="text-gray-600 font-medium mb-1">{{ $owner->phone_number }}</p>
            <p class="text-gray-700 text-base text-center">{{ $owner->email }}</p>

            <a href="{{ route('owners.index') }}" 
               class="mt-6 px-6 py-2 bg-gray-500 text-white rounded-full hover:bg-gray-600 transition">
                Back to All Owners
            </a>


            <form action="{{ route('owners.destroy', $owner) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this owner?');">
                @csrf
                @method('DELETE')
             <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                Delete Owner
             </button>
            </form>


        </div>

       <!-- Pets Section -->
<div class="w-full mx-auto -mt-4">
    <h3 class="text-3xl font-semibold mb-12 text-center">
       {{ $owner->name }}'s Pets
    </h3>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 justify-items-center">
        @foreach($owner->pets as $pet)
            <a href="{{ route('pets.show', $pet) }}">
                <x-pet-card 
                    :name="$pet->name" 
                    :species="$pet->species" 
                    :age="$pet->age" 
                    :description="$pet->description" 
                    :image="$pet->image"
                />
            </a>
        @endforeach
    </div>
</div>


    </div>
</x-app-layout>
