<x-app-layout>

    <div class="max-w-4xl mx-auto py-10">

        <h1 class="text-2xl font-bold mb-6">
            Appointments for {{ $pet->name }}
        </h1>

        @if($appointments->isEmpty())
            <p class="text-gray-600">No appointments found.</p>
        @else
            <ul class="space-y-4">
                @foreach($appointments as $appointment)
                    <li class="border p-4 rounded-lg bg-white flex justify-between items-center">

                        <div>
                            <p class="font-semibold text-lg">{{ $appointment->appointment_type }}</p>
                            <p class="text-gray-600 text-sm">
                                {{ date('M d, Y', strtotime($appointment->appointment_date)) }}
                            </p>
                        </div>

                        <a href="{{ route('appointments.show', $appointment) }}"
                           class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-full 
                                  border border-gray-200 hover:bg-gray-100 hover:text-blue-700 transition">
                            View
                        </a>

                    </li>
                @endforeach
            </ul>
        @endif

        <div class="mt-6 flex items-center gap-4">

        <div class="mt-6 flex items-center gap-4">

{{-- Back to Pet --}}
<a href="{{ route('pets.show', $pet) }}" 
   class="py-2.5 px-5 text-sm font-medium text-white bg-gray-500 rounded-full hover:bg-gray-600 transition">
    Back to Pet
</a>

{{-- Only vets can add appointment --}}
@if(auth()->user()->role === 'vet')
    <a href="{{ route('pets.appointments.create', $pet) }}"
       class="py-2.5 px-5 text-sm font-medium text-gray-700 bg-gray-100 border rounded-full hover:bg-blue-100 transition">
        Add Appointment
    </a>
@endif



</div>


    </div>

</x-app-layout>
