<x-app-layout>
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white">

                <div class="text-center lg:text-left p-4">
                    <h1 class="text-6xl font-extrabold text-gray-900 text-center">
                        Meet The Pets
                    </h1>
                </div>
 <!-- Success message -->
                <div class="p-6">
                    <x-alert-success>
                        {{ session('success') }}
                    </x-alert-success>
    <!-- creates form to filter pets by species// -->
                    <form method="GET" action="{{ route('pets.index') }}">
    <label for="species">Filter by Species:</label>
    <select name="species" id="species">
        <option value="">All</option>
        <option value="Cat" {{ request('species') == 'cat' ? 'selected' : '' }}>cat</option>
        <option value="Dog" {{ request('species') == 'Dog' ? 'selected' : '' }}>Dog</option>
        <option value="Rabbit" {{ request('species') == 'Rabbit' ? 'selected' : '' }}>Rabbit</option>
        <option value="Lizard" {{ request('species') == 'Lizard' ? 'selected' : '' }}>Lizard</option>
        <option value="Bird" {{ request('species') == 'Lizard' ? 'selected' : '' }}>Bird</option>
    </select>
    <button type="submit">Go</button>
</form>


                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($pets as $pet)
                        <div class="relative border border-gray-200 rounded-xl shadow-sm bg-white overflow-hidden group hover:shadow-2xl transition-shadow duration-300 ">
                            <a href="{{ route('pets.show', $pet) }}">
                                <x-pet-card 
                                    :name="$pet->name" 
                                    :breed="$pet->breed" 
                                    :age="$pet->age" 
                                    :image="$pet->image"
                                />
                            </a>

                            <p class="text-gray-700 text-sm mt-4 text-center">
                                {{ Str::limit($pet->description, 50, '...') }}
                            </p>

                            <div class="mt-4 flex justify-center gap-4 my-4">
                                <!-- Edit Button -->
                                <a href="{{ route('pets.edit', $pet) }}"
                                   class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-full border border-gray-200 
                                          hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 transition">
                                    Edit
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('pets.destroy', $pet) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this pet?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-full border border-gray-200 
                                                   hover:bg-gray-100 hover:text-red-500 focus:z-10 focus:ring-4 focus:ring-gray-100 transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
