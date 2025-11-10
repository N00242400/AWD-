<x-app-layout>
    <x-slot-name="header">
        <h2 class ="font-semibold text-xl text gray-800 leading-tight">
            {{__('Edit Review')}}
        </h2>
    </x-slot>

    <div class = "py-12">
            <div class="bg-white">
                <div class="flex flex-col items-center justify-center">
                    <h2 class="text-3xl font-extrabold text-gray-900 text-center">
                        Edit Appointment
                    </h2>

                    <x-appointment-form
                    :action="route('appointment.update', $appointment)"
                    :method="'PUT'"
                    :appointment="$appointment"

                    />

                </div>
            </div>
    </div>
</x-app-layout>