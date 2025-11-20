@props(['action', 'method', 'owner' => null, 'pets' => []])


<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif


    {{-- Name --}}
    <div class="mb-4">
        <label for="name" class="block text-sm text-gray-700">Name</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $owner->name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('name')
            <p class="text-sm text-red-600" id="name-error">{{ $message }}</p>
        @enderror
    </div>

    {{-- Email --}}
    <div class="mb-4">
        <label for="email" class="block text-sm text-gray-700">Email</label>
        <input
            type="email"
            name="email"
            id="email"
            value="{{ old('email', $owner->email ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('email')
            <p class="text-sm text-red-600" id="email-error">{{ $message }}</p>
        @enderror
    </div>

    {{-- Profile Picture --}}
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Profile Picture</label>
         {{-- If editing an existing owner and they already have an image, show a preview --}}
        @if(isset($owner) && $owner->image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $owner->image) }}" alt="{{ $owner->name }}" class="w-24 h-24 object-cover rounded-full">
            </div>
        @endif
            {{-- File input for uploading a new profile picture --}}
        <input
            type="file"
            name="image"
            id="image"
            {{ isset($owner) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('image')
            <p class="text-sm text-red-600" id="image-error">{{ $message }}</p>
        @enderror
    </div>

    {{-- Phone Number --}}
    <div class="mb-4">
        <label for="phone_number" class="block text-sm text-gray-700">Phone Number</label>
        <input
            type="text"
            name="phone_number"
            id="phone_number"
            value="{{ old('phone_number', $owner->phone_number ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('phone_number')
            <p class="text-sm text-red-600" id="phone-error">{{ $message }}</p>
        @enderror
    </div>

    {{-- Pets checkbox--}}
<div class="mb-4">
    <label class="block text-sm text-gray-700 mb-1">Pets</label>

    @foreach($pets as $pet)
        <label class="flex items-center gap-2 mb-1">
            <input
                type="checkbox"
                name="pets[]"
                value="{{ $pet->id }}"
            >
            <div>{{ $pet->name }} ({{ $pet->species }})</div>
        </label>
    @endforeach
</div>


    {{-- Submit Button --}}
    <x-primary-button>
        {{ isset($owner) ? 'Update Owner' : 'Save Owner' }}
    </x-primary-button>
</form>