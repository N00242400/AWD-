@props(['name','species','age','description','image'])

<div class = "border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
     <h4 class="font-bold text-lg">{{$name}}</h4>
     <img 
        src="{{ asset('images/' . $image) }}" 
        alt="{{ $name }}"
        {{-- formatting picture size --}}
        class="w-full h-80 object-cover rounded-md mb-4"
    >

</div>