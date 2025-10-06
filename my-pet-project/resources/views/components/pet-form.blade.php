{{-- action - where the form sends data --}}
{{-- method - what type of action (saving data) --}}
{{-- The form always sends data as POST. --}}

@props(['action', 'method'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    {{-- name form --}}
    <div class="mb-4">
        <label for="name" class="block text-sm text-gray-700">Name</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $pet->name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- species form --}}
    <div class="mb-4">
        <label for="species" class="block text-sm text-gray-700">Species</label>
        <input
            type="text"
            name="species"
            id="species"
            value="{{ old('species', $pet->species ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('species')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- age form --}}
    <div class="mb-4">
        <label for="age" class="block text-sm text-gray-700">Age</label>
        <input
            type="number"
            name="age"
            id="age"
            value="{{ old('age', $pet->age ?? '') }}"
            required
            min="0"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('age')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- description form --}}
    <div class="mb-4">
        <label for="description" class="block text-sm text-gray-700">Description</label>
        <textarea
            name="description"
            id="description"
            rows="4"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        >{{ old('description', $pet->description ?? '') }}</textarea>
        @error('description')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- image form --}}
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Pet Image</label>
        <input
            type="file"
            name="image"
            id="image"
            {{ isset($pet) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('image')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    @isset($pet->image)
        <div class="mb-4">
            <img src="{{ asset($pet->image) }}" alt="Pet image" class="w-24 h-24 object-cover rounded-md" />
        </div>
    @endisset

    <div>
        <x-primary-button>
            {{ isset($pet) ? 'Update Pet' : 'Add Pet' }}
        </x-primary-button>
    </div>
</form>
