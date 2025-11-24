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

                    <div class="mt-8 flex justify-center gap-4">
                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'vet')    
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


                        <a href="{{ route('pets.appointments.index', $pet) }}"
                             class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-full border border-gray-200 
                            hover:bg-gray-100 hover:text-blue-700 transition">
                         View Appointments
                        </a>
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
                <

     <div class="mt-12">
         <h3 class="text-2xl font-semibold mb-6 text-center">
             {{ $pet->name }}s' Owners
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


        
    </div>
</x-app-layout>
