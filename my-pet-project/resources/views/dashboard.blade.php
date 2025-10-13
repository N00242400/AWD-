<x-app-layout>
<div class=" bg-white">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <div class="flex flex-col lg:flex-row items-center ">

      <!-- Left -->
      <div class="text-center lg:text-left p-4">
        <h1 class="text-6xl font-extrabold text-gray-900 dark:text-white">
        Discover & Manage Your Pets
        </h1>
      </div>

      <!-- Right -->
      <div class="flex items-center justify-center ">
        <img src="/images/dashboard-bg.png" alt="Dashboard Image" class="w-[48rem] h-[48rem] object-contain rounded">
      </div>

    </div>

  </div>
</div>

      </div>
      <!-- Pet links -->
      <div class="flex flex-col md:flex-row justify-center gap-10 mt-10">
        <!-- View All Pets -->
        <a href="" class="flex flex-col items-center">
          <div class="w-48 h-48 rounded-full bg-blue-100 shadow-md flex items-center justify-center hover:bg-blue-200 transition">
            <img src="/images/viewpet.png" alt="View All Pets" class="w-28 h-28">
          </div>
          <p class="mt-4 text-center text-gray-800 font-semibold text-lg">View All Pets</p>
        </a>

        <!-- Add A Pet -->
        <a href="" class="flex flex-col items-center">
          <div class="w-48 h-48 rounded-full bg-green-100 shadow-md flex items-center justify-center hover:bg-green-200 transition">
            <img src="/images/addpet.png" alt="Add A Pet" class="w-28 h-28">
          </div>
          <p class="mt-4 text-center text-gray-800 font-semibold text-lg">Add A Pet</p>
        </a>
      </div>

    </div>
  </div>
</x-app-layout>

