@props(['name', 'species', 'age', 'description', 'image'])

<div class="max-w-sm bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
    <img 
        src="{{ asset('images/' . $image) }}" 
        alt="{{ $image }}" 
        class="w-full h-80 object-cover"
     
    >

    <div class="p-4">
        <h3 class="text-xl font-semibold text-gray-800 mb-1">{{ $name }}</h3>

        <p class="text-gray-600 font-medium mb-2">{{ $species }} &bull; {{ $age }} years old</p>
        <p class="text-gray-700 text-sm line-clamp-3">{{ $description }}</p>
    </div>
</div>
