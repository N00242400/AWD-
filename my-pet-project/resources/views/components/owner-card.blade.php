@props(['name', 'email', 'phone_number', 'image'])

<div class="max-w-5xl mx-auto sm:px-6 lg:px-8 flex gap-8">
    <!-- Image on left -->
    <div class="flex w-96 h-96 ">
        <img 
            src="{{ asset('images/' . $image) }}" 
            alt="{{ $image }}" 
            class="w-full h-full object-cover"
        />
    </div>

    <!-- Pet info on right -->
    <div class="flex flex-col justify-center flex-1">
        <p class="text-gray-600 font-medium mb-1 text-lg tracking-wide">{{ $name }}</p>
        <p class="text-gray-600 font-medium mb-3 text-lg tracking-wide">{{ $email }} </p>
        <p class="text-gray-700 text-base leading-relaxed line-clamp-5">{{ $phone_number }}</p>
    </div>
</div>
