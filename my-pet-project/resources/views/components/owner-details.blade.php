@props(['name', 'email', 'phone_number', 'image'])

<div class="max-w-5xl mx-auto sm:px-6 lg:px-8 flex flex-col md:flex-row gap-8 items-center">
    <div class="flex-shrink-0">
        <img 
            src="{{ asset('images/' . $image) }}" 
            alt="{{ $name }}" 
            class="w-64 h-64 rounded-full object-cover shadow-lg"
        >
    </div>

    <!-- owners info on right -->
    <div class="flex flex-col justify-center flex-1 text-center md:text-left">
        <p class="text-gray-600 font-medium text-lg mb-1">{{ $phone_number }}</p>
        <p class="text-gray-600 font-medium text-lg mb-1">{{ $email }}</p>
    </div>
</div>
