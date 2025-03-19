<nav class="bg-white border-b border-gray-200 z-30 fixed top-0 left-0 right-0 h-16">
    <div class="px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
        <div class="flex items-center gap-4">
            <button type="button" onclick="toggleSidebar()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-bars text-lg"></i>
            </button>
            <img src="https://buksu.edu.ph/wp-content/uploads/2021/02/cropped-BukSU-Logo-300x300.png" class="h-8 w-8">
            <span class="text-lg font-semibold text-buksu-dark">BukSU eVoting</span>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-sm text-gray-600">{{ Auth::user()->name ?? 'Admin User' }}</span>
            <form method="POST" action="#">
                @csrf
                <button type="submit" class="bg-buksu-dark text-white px-3 py-2 rounded-lg text-sm hover:bg-buksu-green transition-colors">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>
