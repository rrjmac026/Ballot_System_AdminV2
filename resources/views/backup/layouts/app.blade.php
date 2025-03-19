<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'BukSU Voting System') }}</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="min-h-screen">
        @include('layouts.navigation')
        @include('layouts.sidebar')

        <!-- Main Content -->
        <main id="mainContent" class="pl-64 pt-16 min-h-screen">
            <div class="p-8 space-y-6">
                @yield('content')
            </div>
        </main>
    </div>

    @stack('scripts')
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
