<x-app-layout>
    <div class="py-12 bg-white" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white ">
                   
      <div class="text-center lg:text-left p-4">
        <h1 class="text-6xl font-extrabold text-gray-900 text-center">
        View All Pets
        </h1>
     

 

    </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Success Alert -->
                        <x-alert-success>
                            {{ session('success') }}
                        </x-alert-success>

                        @foreach($pets as $pet)
                        <div class="bg-white  ">
                            <a href="{{ route('pets.show', $pet) }}">
                                <x-pet-card 
                                    :name="$pet->name" 
                                    :breed="$pet->breed" 
                                    :age="$pet->age"
                                    :description="$pet->description"
                                    :image="$pet->image"
                                />
                            </a>
                            <div class="mt-4 flex item-centre space-x-2">
                                <!-- Edit Button -->
                                <a href="{{ route('pets.edit', $pet) }}"
                                   class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"">
                                    Edit
                                </a>
                                <!-- Delete Button -->
                                <form action="{{ route('pets.destroy', $pet) }}" method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this pet?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-red-500 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
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



