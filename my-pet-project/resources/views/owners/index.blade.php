<x-app-layout>
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white">

                <!-- Page Header -->
                <div class="flex items-center justify-center p-4">
                    <h1 class="text-6xl font-extrabold text-gray-900 mr-4 text-center">
                        Meet The Owners
                    </h1>
                    <img src="/images/paws.png" alt="Paws logo" class="w-28 h-28" />
                </div>

                <!-- Success Message -->
                <div class="p-6">
                    <x-alert-success>
                        {{ session('success') }}
                    </x-alert-success>

                
                    <!-- Owners Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($owners as $owner)
                        <a href="{{ route('owners.show', $owner)}}">
                            <div class="relative border border-gray-200 rounded-xl shadow-sm bg-white overflow-hidden group hover:shadow-2xl transition-shadow duration-300">
                               <x-owner-card
                               :name="$owner->name"
                               :image="$owner->image"
                               :email="$owner->email"
                               :phone_number="$owner->phone_number"
                               />
                            </div>
                        @endforeach
        
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
