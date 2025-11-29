<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Appointment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="bg-white">
            <div class="flex flex-col items-center justify-center">
                <h2 class="text-3xl font-extrabold text-gray-900 text-center">
                    Create Appointment
                </h2>

                {{-- Renders the appointment creation form --}}
                <x-appointment-form
                    :action="route('pets.appointments.store', $pet)"
                    :method="'POST'"
                    :appointment="null"
                    :pet="$pet"
                />
            </div>
        </div>
    </div>
</x-app-layout>
