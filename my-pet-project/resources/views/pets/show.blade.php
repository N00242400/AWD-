<x-app-layout>
    <!-- Success Alert -->
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12 bg-gray-50">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- Pet Card -->
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
                
                <!-- Pet Image at the top 
                <div class="w-full h-80 overflow-hidden">
                    <img 
                        src="{{ asset('images/' . $pet->image) }}" 
                        alt="{{ $pet->name }}" 
                        class="w-full h-full object-cover"
                    />
                </div> -->

                <!-- Pet Info Section -->
                <div class="p-8 space-y-6">
                    <h2 class="text-3xl font-extrabold text-gray-900 text-center">{{ $pet->name }}</h2>
                

                    <div class="mt-4">
                        <x-pet-details
                            :name="$pet->name"
                            :age="$pet->age"
                            :species="$pet->species"
                            :description="$pet->description"
                            :image="$pet->image"
                        />
                    </div>

                    <div class="text-center mt-6">
    <a href="{{ route('pets.index') }}" 
       class="inline-block px-6 py-2 bg-gray-500 text-white font-semibold rounded-full hover:bg-gray-600 transition">
        Back to Menu
    </a>
</div>

            </div>
        </div>
    </div>
</x-app-layout>
