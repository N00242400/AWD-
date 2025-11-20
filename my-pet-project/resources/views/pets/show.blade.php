<x-app-layout>
    <!-- Success Alert -->
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12 bg-white">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white">

                <!-- Pet Info Section -->
                <div class="flex flex-col items-center justify-center">
                    <h2 class="text-3xl font-extrabold text-gray-900 text-center">
                        Meet {{ $pet->name }}
                    </h2>

                    <div class="mt-4">
                        <x-pet-details
                            :name="$pet->name"
                            :age="$pet->age"
                            :species="$pet->species"
                            :description="$pet->description"
                            :image="$pet->image"
                        />
                    </div>
                </div>

     <div class="mt-12">
         <h3 class="text-2xl font-semibold mb-6 text-center">
             {{ $pet->name }} Owners
          </h3>

                @if($pet->owners->isEmpty())
                    <p class="text-gray-600 text-center">This pet has no owners assigned.</p>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($pet->owners as $owner)
                            <a href="{{ route('owners.show', $owner)}}">
                                <div class="relative border border-gray-200 rounded-xl shadow-sm bg-white overflow-hidden group hover:shadow-2xl transition-shadow duration-300">
                                    <x-owner-card
                                        :name="$owner->name"
                                        :image="$owner->image"
                                        :email="$owner->email"
                                        :phone_number="$owner->phone_number"
                                    />
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>


                <!-- Appointment info -->
                <h4 class="font-semibold text-md mt-8">Appointments</h4>

                @if($pet->appointments->isEmpty())
                    <p class="text-gray-600">No appointments yet.</p>
                @else
                    <ul class="mt-4 space-y-4">
                        @foreach($pet->appointments as $appointment)
                            <li class="border p-4 rounded-lg">
                                <p class="font-semibold">
                                    Scheduled by: {{ $appointment->user->name }} 
                                    ({{ $appointment->created_at->format('M d, Y') }})
                                </p>
                                <p>Type: {{ $appointment->appointment_type }}</p>
                                <p>Vet: {{ $appointment->vet_name }}</p>
                                <p>Clinic: {{ $appointment->clinic_name }}</p>
                                <p>Appointment Date: {{ date('M d, Y', strtotime($appointment->appointment_date)) }}</p>

                                @if($appointment->vet_notes)
                                    <p>Notes: {{ $appointment->vet_notes }}</p>
                                @endif

                                <!-- Admin or owner can edit/delete -->
                                @if ($appointment->user->is(auth()->user()) || auth()->user()->role === 'admin')
                                    <a href="{{ route('appointments.edit', $appointment) }}" class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-full border border-gray-200 
                                        hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 transition">
                                        {{ __('Edit Appointment') }}
                                    </a>

                                    <form method="POST" action="{{ route('appointments.destroy', $appointment) }}" class="inline">
                                        @csrf
                                        @method('delete')
                                        <x-danger-button
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Delete Appointment') }}
                                        </x-danger-button>
                                    </form>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif

                @if(auth()->user()->role === 'admin')
                    <!-- Adding Appointment -->
                    <h4 class="font-semibold text-md mt-8">Add an appointment</h4>
                    <form action="{{ route('pets.appointments.store', $pet) }}" method="POST" class="mt-4">
                        @csrf

                        <div class="mb-4">
                            <label for="appointment_type" class="block text-gray-700 font-medium mb-2">Appointment Type</label>
                            <select name="appointment_type" id="appointment_type" class="w-full border rounded p-2">
                                <option value="checkup">Checkup</option>
                                <option value="vaccination">Vaccination</option>
                                <option value="surgery">Surgery</option>
                                <option value="grooming">Grooming</option>
                            </select>

                            <label for="vet_name" class="block text-gray-700 font-medium mb-2">Vet Name</label>
                            <input type="text" name="vet_name" id="vet_name" class="w-full border rounded p-2" required>

                            <label for="clinic_name" class="block text-gray-700 font-medium mb-2">Clinic Name</label>
                            <input type="text" name="clinic_name" id="clinic_name" class="w-full border rounded p-2" required>

                            <label for="appointment_date" class="block text-gray-700 font-medium mb-2">Appointment Date</label>
                            <input type="date" name="appointment_date" id="appointment_date" class="w-full border rounded p-2" required>

                            <label for="vet_notes" class="block text-gray-700 font-medium mb-2">Vet Notes</label>
                            <textarea name="vet_notes" id="vet_notes" rows="3" class="w-full border rounded p-2"></textarea>
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Add Appointment
                        </button>
                    </form>
                @endif

                <div class="mt-8 flex justify-center gap-4">
                    @if(auth()->user()->role === 'admin')
                        <!-- Edit Button -->
                        <a href="{{ route('pets.edit', $pet) }}"
                           class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-full border border-gray-200 
                                  hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 transition">
                            Edit
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('pets.destroy', $pet) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this pet?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-full border border-gray-200 
                                           hover:bg-gray-100 hover:text-red-500 focus:z-10 focus:ring-4 focus:ring-gray-100 transition">
                                Delete
                            </button>
                        </form>
                    @endif

                    <!-- Back Button -->
                    <a href="{{ route('pets.index') }}" 
                       class="py-2.5 px-5 text-sm font-medium text-white bg-gray-500 rounded-full border border-gray-200 
                              hover:bg-gray-600 focus:z-10 focus:ring-4 focus:ring-gray-100 transition">
                        Back to Menu
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
