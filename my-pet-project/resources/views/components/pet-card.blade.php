@props(['name','species','age','description','image'])

<div class = " bg-white ">
<h4 class="font-extrabold text-2xl text-center my-4">{{ $name }}</h4>

     <img 
        src="{{ asset('images/' . $image) }}" 
        alt="{{ $name }}"
        {{-- formatting picture size --}}
        class="w-full h-80 object-cover  mb-4"
    >

</div>