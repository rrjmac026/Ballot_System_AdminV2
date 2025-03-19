<div x-show="sidebarOpen" 
    x-transition:enter="transition-transform ease-in-out duration-300"
    x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition-transform ease-in-out duration-300"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
    class="fixed left-0 top-16 h-[calc(100vh-4rem)] w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700">
    
    <div class="p-4 space-y-1">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
            <i class="fas fa-home w-5 h-5"></i>
            <span>Dashboard</span>
        </a>
        <a href="{{ route('organizations.index') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
            <i class="fas fa-building w-5 h-5"></i>
            <span>Organizations</span>
        </a>
        <a href="{{ route('positions.index') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
            <i class="fas fa-user-tie w-5 h-5"></i>
            <span>Positions</span>
        </a>
        <a href="{{ route('candidates.index') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
            <i class="fas fa-users w-5 h-5"></i>
            <span>Candidates</span>
        </a>
        <a href="{{ route('colleges.index') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
            <i class="fas fa-university w-5 h-5"></i>
            <span>Colleges</span>
        </a>
        <a href="{{ route('partylists.index') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
            <i class="fas fa-flag w-5 h-5"></i>
            <span>Partylists</span>
        </a>
        <a href="{{ route('casted_votes.index') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
            <i class="fas fa-vote-yea w-5 h-5"></i>
            <span>Casted Votes</span>
        </a>
        <a href="{{ route('voters.index') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
            <i class="fas fa-vote-yea w-5 h-5"></i>
            <span>Voters</span>
        </a>
        <!-- <a href="{{ route('reports.index') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
            <i class="fas fa-chart-bar w-5 h-5"></i>
            <span>Reports</span>
        </a> -->
        <a href="{{ route('settings.index') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
            <i class="fas fa-cog w-5 h-5"></i>
            <span>Settings</span>
        </a>
    </div>
</div>

