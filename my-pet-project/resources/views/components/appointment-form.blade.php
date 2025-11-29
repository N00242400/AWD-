@props(['action', 'method' => 'POST', 'pet', 'appointment' => null])

<form action="{{ $action }}" method="POST" class="w-full max-w-lg">
    @csrf

    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    {{-- Appointment Type --}}
    <div class="mb-4">
        <label for="appointment_type" class="block text-sm text-gray-700">Appointment Type (optional)</label>

        <select name="appointment_type"
                id="appointment_type"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">

            <option value="">-- Select --</option>

            @foreach(['checkup', 'vaccination', 'surgery', 'grooming'] as $type)
                <option value="{{ $type }}"
                    {{ old('appointment_type', $appointment->appointment_type ?? '') === $type ? 'selected' : '' }}>
                    {{ ucfirst($type) }}
                </option>
            @endforeach

        </select>

        @error('appointment_type')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Vet Name --}}
    <div class="mb-4">
        <label for="vet_name" class="block text-sm text-gray-700">Vet Name</label>
        <input
            type="text"
            name="vet_name"
            id="vet_name"
            value="{{ old('vet_name', $appointment->vet_name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('vet_name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Clinic Name --}}
    <div class="mb-4">
        <label for="clinic_name" class="block text-sm text-gray-700">Clinic Name</label>
        <input
            type="text"
            name="clinic_name"
            id="clinic_name"
            value="{{ old('clinic_name', $appointment->clinic_name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('clinic_name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Appointment Date --}}
    <div class="mb-4">
        <label for="appointment_date" class="block text-sm text-gray-700">Appointment Date</label>
        <input
            type="date"
            name="appointment_date"
            id="appointment_date"
            value="{{ old('appointment_date', $appointment->appointment_date ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
        />
        @error('appointment_date')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Vet Notes --}}
    <div class="mb-4">
        <label for="vet_notes" class="block text-sm text-gray-700">Vet Notes (optional)</label>
        <textarea
            name="vet_notes"
            id="vet_notes"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            maxlength="500"
            rows="3"
        >{{ old('vet_notes', $appointment->vet_notes ?? '') }}</textarea>

        @error('vet_notes')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Submit Button --}}
    <x-primary-button>
        {{ $appointment ? 'Update Appointment' : 'Create Appointment' }}
    </x-primary-button>

</form>
