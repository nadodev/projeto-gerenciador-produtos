<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css'])

    </head>
  <body>
    <main class="flex h-screen main">
        <div class="bg-gray-800 text-white w-64 space-y-6 py-7 px-2 hidden md:block sidebar">
            <a href="#" class="text-white flex items-center space-x-2 px-4">
                <span class="text-2xl font-extrabold">Dashboard</span>
            </a>
            <nav>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Home</a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Profile</a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Settings</a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700">Logout</a>
            </nav>
        </div>
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="bg-white shadow-md w-full px-4 py-4">
                <div class="flex items-center justify-between">
                    <div class="md:hidden">
                        <button class="text-gray-500 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="text-2xl font-semibold">Dashboard</div>
                    <div class="flex items-center space-x-4">
                        <a href="#" class="text-gray-600">Login</a>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-4 ">
                @yield('content')
            </main>
        </div>

    </main>
  </body>
  <script>
    const sidebar = document.querySelector('.sidebar');
    const main = document.querySelector('.main');
    const menuButton = document.querySelector('header button');

    menuButton.addEventListener('click', () => {
        sidebar.classList.toggle('hidden');
        main.classList.toggle('overflow-hidden');
    });
</script>
</html>
