<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css" integrity="sha512-OQDNdI5rpnZ0BRhhJc+btbbtnxaj+LdQFeh0V9/igiEPDiWE2fG+ZsXl0JEH+bjXKPJ3zcXqNyP4/F/NegVdZg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @vite(['resources/css/app.css'])

    </head>
  <body>
    <main class="flex h-screen main">
        @include('dashboard.partials.sidebar')
        <div class="flex flex-col flex-1">
            <!-- Navbar -->
            @include('dashboard.partials.navbar')
            <!-- Content -->
            <main class="flex-1 p-4 overflow-y-auto ">
                @yield('content')
            </main>
        </div>
    </main>
  </body>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@stack('script')
  </html>
