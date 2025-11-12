@props(['name','species','age','description','image'])

<div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col items-center text-center hover:shadow-2xl transition-shadow duration-300 p-4">
<h4 class="font-bold text-3xl text-gray-900 mb-1">{{ $name }}</h4>

    <img 
        src="{{ asset('images/' . $image) }}" 
        alt="{{ $name }}"
        class="w-64 h-64 rounded-full object-cover shadow-md mb-4"
    >

    <!-- Pet Info -->
    <p class="text-gray-700 text-sm mb-2">{{ $age }} years old</p>
    <p class="text-gray-500 text-sm line-clamp-3">{{ Str::limit($description, 60, '...') }}</p>

</div>
