<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Add an Owner')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Add a New Pet:</h3>

                {{-- Using the ownerformto create a new owner--}}
                <x-owner-form
                :action="route('owners.store')"
                :method="'POST'"
                {{--  passes all pets from controller to the component so the form can display the pets --}}
                 :pets="$pets"
                />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>