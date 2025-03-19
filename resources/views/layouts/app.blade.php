<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
      x-data="{ darkMode: localStorage.getItem('theme') === 'dark', sidebarOpen: localStorage.getItem('sidebar') === 'true' }"
      x-init="
        $watch('sidebarOpen', value => localStorage.setItem('sidebar', value));
        if (darkMode) { 
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
      "
      :class="{'dark': darkMode}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BukSU Voting System Admin</title>

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('images/tab_icon.png') }}">

</head>
<body class="bg-gray-50 dark:bg-gray-900">
    <div class="min-h-screen">
        <!-- Top Navigation -->
        @include('layouts.navigation')

        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content -->
        <main id="mainContent" class="transition-all duration-300" 
              :class="{'pl-64': sidebarOpen, 'pl-0': !sidebarOpen}">
            <div class="p-8 space-y-6 pt-24">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
