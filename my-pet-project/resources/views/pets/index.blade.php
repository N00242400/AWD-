<x-app-layout>
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white">

                <!-- Page Header -->
                <div class="flex items-center justify-center p-4">
                    <h1 class="text-6xl font-extrabold text-gray-900 mr-4 text-center">
                        Meet The Pets
                    </h1>
                    <img src="/images/paws.png" alt="Paws logo" class="w-28 h-28" />
                </div>

                <!-- Success Message -->
                <div class="p-6">
                    <x-alert-success>
                        {{ session('success') }}
                    </x-alert-success>

                   <!-- Filter and meet the owners-->

           <!-- Meet the Owners Button -->
           <a href="{{ route('owners.index') }}" 
              class="text-black-600 font-bold text-lg hover:text-gray-700 hover:underline transition">
              Meet the Owners →
           </a>
                <div class="flex items-center justify-between mb-6">
                        <form method="GET" action="{{ route('pets.index') }}">
                            <label for="species" class="mr-2 font-semibold">Filter by Species:</label>
                            <select name="species" id="species" class="border rounded w-28 px-2 py-1">
                                <option value="">All</option>
                                <option value="Cat" {{ request('species') == 'Cat' ? 'selected' : '' }}>Cat</option>
                                <option value="Dog" {{ request('species') == 'Dog' ? 'selected' : '' }}>Dog</option>
                                <option value="Rabbit" {{ request('species') == 'Rabbit' ? 'selected' : '' }}>Rabbit</option>
                                <option value="Lizard" {{ request('species') == 'Lizard' ? 'selected' : '' }}>Lizard</option>
                                <option value="Bird" {{ request('species') == 'Bird' ? 'selected' : '' }}>Bird</option>
                                <option value="Rat" {{ request('species') == 'Rat' ? 'selected' : '' }}>Rat</option>
                            </select>
                            <button 
                                type="submit" 
                                class="ml-2 px-4 py-1.5 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                                Go
                            </button>
                        </form>

     
                    </div>


                    <!-- Pets Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($pets as $pet)
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
    </div>
</x-app-layout>
