<x-app-layout>
    <x-slot name="header">
        <h2>Edit Owner</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm rounded-lg">
                <x-owner-form 
                    :action="route('owners.update', $owner)" 
                    :method="'PUT'" 
                  {{--  pre-fills the form fields with the owner’s existing info --}}
                    :owner="$owner" 
                    {{--   shows all pets with the ones already assigned checked --}}
                    :pets="$pets"
                />
            </div>
        </div>
    </div>
</x-app-layout>
