<x-app-layout>
    <!-- Success Alert -->
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12 bg-white">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white">
            <!-- owners-->
                <div class="flex flex-col items-center justify-center">
                    <h2 class="text-3xl font-extrabold text-gray-900 text-center">
                     {{ $owner->name }}
                    </h2>

                    <div class="mt-4">
                        <x-owner-details
                               :name="$owner->name"
                               :image="$owner->image"
                               :email="$owner->email"
                               :phone_number="$owner->phone_number"
                        />
                        </div>

                        <!-- Pets Section -->
                    <div class="mt-8 w-full max-w-6xl">
                        <h3 class="text-2xl font-semibold mb-4 text-center">Meet {{ $owner->name }}'s Pets</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($owner->pets as $pet)
                                    <div class="border rounded-lg shadow p-4">
                                        <a href="{{ route('pets.show', $pet) }}">
                                            <x-pet-card 
                                                :name="$pet->name" 
                                                :breed="$pet->breed" 
                                                :age="$pet->age" 
                                                :image="$pet->image"
                                            />
                                        </a>
                                        <p class="text-gray-700 mt-2 text-center">
                                            {{ Str::limit($pet->description, 50, '...') }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                    </div>
        
    <!-- Back Button -->
     <a href="{{ route('owners.index') }}" 
         class="py-2.5 px-5 text-sm font-medium text-white bg-gray-500 rounded-full border border-gray-200  hover:bg-gray-600 focus:z-10 focus:ring-4 focus:ring-gray-100 transition">
            Back to Menu
     </a>
</div>
 </div>
 </div>
 </div>
 </x-app-layout>


