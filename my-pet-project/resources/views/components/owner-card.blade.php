@props(['name', 'email', 'phone_number', 'image'])

<div class="bg-white text-center"> 
    <h4 class="font-extrabold text-2xl my-4">{{ $name }}</h4>

    <img 
    
        src="{{ asset('images/' . $image) }}" 
        alt="{{ $name }}"
        class="w-full h-80 object-cover mb-4 mx-auto" 
    >

    <div class="flex flex-col items-center justify-center">
        <p class="text-gray-600 font-medium mb-3 text-lg tracking-wide">{{ $email }}</p>
        <p class="text-gray-700 text-base leading-relaxed line-clamp-5">{{ $phone_number }}</p>
    </div>
</div>
