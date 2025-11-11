<x-app-layout>
    <!-- Success Alert -->
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12 bg-white">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white">

                <div class="flex flex-col items-center justify-center">
                    <h2 class="text-3xl font-extrabold text-gray-900 text-center">
                        Meet {{ $owner->name }}
                    </h2>

                    <div class="mt-4">
                        <x-owner-details
                                 :name="$owner->name"
                               :image="$owner->image"
                               :email="$owner->email"
                               :phone_number="$owner->phone_number"
                        />
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


