<div x-data="{ isOpen: false, darkMode: localStorage.getItem('theme') === 'dark', open: false }">
    <nav 
        class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 z-30 fixed top-0 left-0 right-0 h-16">
        <div class="px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <div class="flex items-center gap-4">
                <!-- Sidebar Toggle -->
                <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white">
                    <i class="fas fa-bars text-lg"></i>
                </button>
                
                <!-- Logo -->
                <img src="{{ asset('images/tab_icon.png') }}" class="h-8 mr-3" alt="BukSU Logo" />
                <a href="{{ route('dashboard') }}" class="hover:opacity-90 transition-opacity duration-150">
                    <span class="self-center text-xl font-bold sm:text-2xl whitespace-nowrap dark:text-white">
                        Buk<span class="text-[#FF9800]">SU</span> Comelec
                    </span>
                </a>
            </div>

            <!-- Profile Dropdown -->
            <div class="relative">
                <!-- Profile Button -->
                <button @click="open = !open" class="flex items-center text-sm text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white focus:outline-none">
                    <span class="mr-2">{{ Auth::user()->name }}</span>
                    <i class="fas fa-caret-down"></i>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false"
                    class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg shadow-lg py-2 z-50">
                    
                    <!-- Profile -->
                    <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                        <i class="fas fa-user mr-2"></i> Profile
                    </a>

                    <!-- Dark Mode Toggle -->
                    <button @click="darkMode = !darkMode; 
                            localStorage.setItem('theme', darkMode ? 'dark' : 'light'); 
                            document.documentElement.classList.toggle('dark', darkMode);" 
                        class="flex items-center w-full px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                        <i x-show="darkMode" class="fas fa-sun mr-2"></i>
                        <i x-show="!darkMode" class="fas fa-moon mr-2"></i>
                        <span x-text="darkMode ? 'Light Mode' : 'Dark Mode'"></span>
                    </button>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>