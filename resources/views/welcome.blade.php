<!DOCTYPE html>
<html lang="en" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BukSU Comelec System</title>
        <x-dark-mode-initializer />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased dark:bg-gray-900">
        <!-- Navigation -->
        @if (Route::has('login'))
            <nav class="fixed w-full z-20 top-0 start-0 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                    <a href="/" class="flex items-center space-x-3">
                        <img src="{{ asset('images/tab_icon.png') }}" class="h-10" alt="BukSU Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                            BukSU <span class="text-[#FF9800]">Comelec</span>
                        </span>
                    </a>
                    <div class="flex md:order-2 space-x-3">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-white bg-[#FF9800] hover:bg-[#F57C00] font-medium rounded-lg text-sm px-4 py-2 text-center">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-white bg-[#FF9800] hover:bg-[#F57C00] font-medium rounded-lg text-sm px-4 py-2 text-center">Admin Login</a>
                        @endauth
                    </div>
                </div>
            </nav>
        @endif

        <!-- Hero Section -->
        <div class="relative isolate px-6 pt-14 lg:px-8 min-h-screen flex items-center">
            <div class="mx-auto max-w-6xl py-32 sm:py-48 lg:py-20">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <!-- Text Content -->
                    <div>
                        <h1 class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-6xl mb-6">
                            Your Voice Matters in BukSU
                        </h1>
                        <p class="text-lg leading-8 text-gray-600 dark:text-gray-300 mb-8">
                            Welcome to Bukidnon State University's Commission on Elections - where we ensure fair, transparent, and secure student elections. Exercise your right to choose your student leaders.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
                                <div class="flex items-center mb-2">
                                    <i class="fas fa-shield-alt text-[#FF9800] text-xl mr-2"></i>
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Secure Voting</h3>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400">Advanced encryption and verification systems ensure your vote remains confidential and secure.</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow">
                                <div class="flex items-center mb-2">
                                    <i class="fas fa-vote-yea text-[#FF9800] text-xl mr-2"></i>
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Easy Process</h3>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400">Simple and intuitive voting interface designed for all BukSU students.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Image/Illustration -->
                    <div class="relative">
                        <img src="{{ asset('images/tab_icon.png') }}" alt="BukSU Comelec" class="w-full max-w-lg mx-auto">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#FF9800]/20 to-transparent rounded-xl"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
            <div class="max-w-screen-xl mx-auto py-6 px-4 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    © {{ date('Y') }} BukSU Comelec. All rights reserved.
                </p>
            </div>
        </footer>
    </body>
</html>
