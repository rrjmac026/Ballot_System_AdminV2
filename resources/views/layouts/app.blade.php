
// filepath: resources/views/layouts/admin/app.blade.php
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'BukSU Voting System Admin') }}</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="min-h-screen">
        @include('layouts.navigation1')
        @include('layouts.sidebar')
        
        <!-- Main Content -->
        <main id="mainContent" class="pl-64 pt-16 min-h-screen">
            {{ $slot }}
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            sidebar.classList.toggle('-translate-x-full');
            mainContent.classList.toggle('pl-0');
        }
    </script>
</body>
</html>