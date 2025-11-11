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

                    <!-- Filter Form -->
                    <form method="GET" action="{{ route('pets.index') }}" class="mb-6">
                        <label for="species" class="mr-2 font-semibold">Filter by Species:</label>
                        <select name="species" id="species" class="border rounded w-20 px-2 py-1">
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
                            class="ml-2 w-20 px-4 py-1.5 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                            Go
                        </button>
                    </form>

                <div class="flex justify-center my-4">
                 <a href="{{ route('owners.index') }}" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                      View All Owners
                </a>
                </div>

                    <!-- Pets Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($pets as $pet)
                            <div class="relative border border-gray-200 rounded-xl shadow-sm bg-white overflow-hidden group hover:shadow-2xl transition-shadow duration-300">
                                <a href="{{ route('pets.show', $pet) }}">
                                    <x-pet-card 
                                        :name="$pet->name" 
                                        :breed="$pet->breed" 
                                        :age="$pet->age" 
                                        :image="$pet->image"
                                    />
                                </a>
                                <p class="text-gray-700 text-sm mt-8 mb-8 mx-8 text-center">
                                    {{ Str::limit($pet->description, 50, '...') }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
