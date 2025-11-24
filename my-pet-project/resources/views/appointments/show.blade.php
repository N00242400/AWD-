<x-app-layout>

    <div class="max-w-4xl mx-auto py-10">

        <h1 class="text-2xl font-bold mb-6">Appointment Details</h1>

        <div class="border p-6 rounded-lg shadow bg-white">

        <p class="mb-2">
    <strong>Pet:</strong> 
    {{ $appointment->pet->name }}
</p>


            <p class="mb-2"><strong>Type:</strong> {{ $appointment->appointment_type }}</p>
            <p class="mb-2"><strong>Vet:</strong> {{ $appointment->vet_name }}</p>
            <p class="mb-2"><strong>Clinic:</strong> {{ $appointment->clinic_name }}</p>
            <p class="mb-2"><strong>Date:</strong> {{ date('M d, Y', strtotime($appointment->appointment_date)) }}</p>

            @if($appointment->vet_notes)
                <p class="mb-2"><strong>Notes:</strong> {{ $appointment->vet_notes }}</p>
            @endif

            <p class="mb-6">
                <strong>Created by:</strong> {{ $appointment->user->name }}
            </p>

            <!-- Vet can only edit/delete  -->
            @if(auth()->user()->role === 'vet')

                <a href="{{ route('appointments.edit', $appointment) }}"
                   class="px-4 py-2 bg-gray-100 border rounded hover:bg-blue-100">
                    Edit Appointment
                </a>

                <form action="{{ route('appointments.destroy', $appointment) }}" 
                      method="POST"
                      class="inline-block"
                      onsubmit="return confirm('Delete this appointment?');">
                    @csrf
                    @method('DELETE')
                    <button class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                        Delete Appointment
                    </button>
                </form>

            @endif

            <div class="mt-6">
                <a href="{{ route('pets.show', $appointment->pet_id) }}" 
                   class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Back to Pet
                </a>
            </div>

        </div>
    </div>

</x-app-layout>
