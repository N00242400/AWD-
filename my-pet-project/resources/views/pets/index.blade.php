<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List Of Pets:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($pets as $pet)
                        <div class="border-4 rounded-lg shadow-md">
                            <a href="{{ route('pets.show', $pet) }}">
                                <x-pet-card 
                                    :name="$pet->name" 
                                    :breed="$pet->breed" 
                                    :age="$pet->age"
                                    :description="$pet->description"
                                    :image="$pet->image"
                                />
                            </a>
                            <div class="mt-4 flex space-x-2">
                                <!-- Edit Button -->
                                <a href="{{ route('pets.edit', $pet) }}" 
                                   class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    Edit
                                </a>
                                <!-- Delete Button -->
                                <form action="{{ route('pets.destroy', $pet) }}" method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this pet?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white font-bold px-4 py-2 rounded hover:bg-red-700">
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
