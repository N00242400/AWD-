<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Pet Manager</title>
    
    <div class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

<div class="w-full max-w-7xl mx-auto flex flex-col lg:flex-row items-center">

    <!-- Left  -->
    <div class="text-center lg:text-left p-4">
        <h1 class="text-5xl lg:text-6xl font-extrabold text-gray-900 dark:text-[#EDEDEC]">
            Welcome to Pet Manager
        </h1>

        <div class="flex flex-col md:flex-row justify-center gap-10 py-10">

            @guest
                <!-- Login Card -->
                <a href="{{ route('login') }}" class="flex flex-col items-center">
                    <div class="w-60 h-60 rounded bg-blue-100 shadow-lg flex items-center justify-center hover:bg-blue-200 transition">
                        <img src="/images/login.png" alt="Login" class="w-28 h-28" />
                    </div>
                    <p class="mt-4 text-center text-gray-900 dark:text-[#EDEDEC] font-semibold text-lg">Login</p>
                </a>

                <!-- Register Card -->
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="flex flex-col items-center">
                        <div class="w-60 h-60 rounded bg-green-100 shadow-lg flex items-center justify-center hover:bg-green-200 transition">
                            <img src="/images/register.png" alt="Register" class="w-28 h-28" />
                        </div>
                        <p class="mt-4 text-center text-gray-900 dark:text-[#EDEDEC] font-semibold text-lg">Register</p>
                    </a>
                @endif
            @else
                <!-- Dashboard Card -->
                <a href="{{ url('/dashboard') }}" class="flex flex-col items-center">
                    <div class="w-60 h-60 rounded bg-purple-100 shadow-lg flex items-center justify-center hover:bg-purple-200 transition">
                        <img src="/images/dashboard.png" alt="Dashboard" class="w-28 h-28" />
                    </div>
                    <p class="mt-4 text-center text-gray-900 dark:text-[#EDEDEC] font-semibold text-lg">Dashboard</p>
                </a>
            @endguest

        </div>
    </div>

    <!-- Right / Hero Image -->
    <div class="flex items-center justify-center mt-10 lg:mt-0">
        <img src="/images/dashboard-bg.png" alt="Hero Image" class="w-[32rem] lg:w-[48rem] h-auto object-contain rounded" />
    </div>

</div>
</div>


    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>
</html>
