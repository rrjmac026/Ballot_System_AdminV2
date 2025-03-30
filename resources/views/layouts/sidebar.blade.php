<div x-show="sidebarOpen" 
    x-transition:enter="transition-transform ease-in-out duration-300"
    x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition-transform ease-in-out duration-300"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
    class="fixed left-0 top-16 h-[calc(100vh-4rem)] w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 overflow-y-auto">
    
    <div class="p-4 space-y-2">
        <!-- Dashboard -->
        <div class="space-y-1">
            <a href="{{ route('dashboard') }}" 
               class="flex items-center gap-3 px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('dashboard') ? 'bg-purple-100 text-purple-700 dark:bg-purple-900 dark:text-purple-300' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                <i class="fas fa-home w-5 h-5"></i>
                <span>Dashboard</span>
            </a>
        </div>
        
        <!-- Organizations -->
        <a href="{{ route('organizations.index') }}" 
           class="flex items-center gap-3 px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('organizations.*') ? 'bg-purple-100 text-purple-700 dark:bg-purple-900 dark:text-purple-300' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
            <i class="fas fa-building w-5 h-5"></i>
            <span>Organizations</span>
        </a>

        <!-- Positions -->
        <a href="{{ route('positions.index') }}" 
           class="flex items-center gap-3 px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('positions.*') ? 'bg-purple-100 text-purple-700 dark:bg-purple-900 dark:text-purple-300' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
            <i class="fas fa-user-tie w-5 h-5"></i>
            <span>Positions</span>
        </a>

        <!-- Candidates -->
        <a href="{{ route('candidates.index') }}" 
           class="flex items-center gap-3 px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('candidates.*') ? 'bg-purple-100 text-purple-700 dark:bg-purple-900 dark:text-purple-300' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
            <i class="fas fa-users w-5 h-5"></i>
            <span>Candidates</span>
        </a>

        <!-- Colleges -->
        <a href="{{ route('colleges.index') }}" 
           class="flex items-center gap-3 px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('colleges.*') ? 'bg-purple-100 text-purple-700 dark:bg-purple-900 dark:text-purple-300' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
            <i class="fas fa-university w-5 h-5"></i>
            <span>Colleges</span>
        </a>

        <!-- Partylists -->
        <a href="{{ route('partylists.index') }}" 
           class="flex items-center gap-3 px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('partylists.*') ? 'bg-purple-100 text-purple-700 dark:bg-purple-900 dark:text-purple-300' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
            <i class="fas fa-flag w-5 h-5"></i>
            <span>Partylists</span>
        </a>

        <!-- Casted Votes -->
        <a href="{{ route('casted_votes.index') }}" 
           class="flex items-center gap-3 px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('casted_votes.*') ? 'bg-purple-100 text-purple-700 dark:bg-purple-900 dark:text-purple-300' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
            <i class="fas fa-vote-yea w-5 h-5"></i>
            <span>Casted Votes</span>
        </a>

        <!-- Rankings -->
        <div class="space-y-1">
            <a href="{{ route('rankings.index') }}" 
               class="flex items-center gap-3 px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('rankings.*') ? 'bg-purple-100 text-purple-700 dark:bg-purple-900 dark:text-purple-300' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                <i class="fas fa-trophy w-5 h-5"></i>
                <span>Rankings</span>
            </a>
        </div>

        <!-- Reports -->
        <a href="{{ route('reports.index') }}" 
           class="flex items-center gap-3 px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('reports.*') ? 'bg-purple-100 text-purple-700 dark:bg-purple-900 dark:text-purple-300' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
            <i class="fas fa-chart-bar w-5 h-5"></i>
            <span>Reports</span>
        </a>

        <!-- Voters -->
        <a href="{{ route('voters.index') }}" 
           class="flex items-center gap-3 px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('voters.*') ? 'bg-purple-100 text-purple-700 dark:bg-purple-900 dark:text-purple-300' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
            <i class="fas fa-user-check w-5 h-5"></i>
            <span>Voters</span>
        </a>

        <!-- Email Logs -->
        <!-- <a href="{{ route('email-logs.index') }}" 
           class="flex items-center gap-3 px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('email-logs.*') ? 'bg-purple-100 text-purple-700 dark:bg-purple-900 dark:text-purple-300' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
            <i class="fas fa-envelope w-5 h-5"></i>
            <span>Email Logs</span>
        </a> -->

        <!-- Maintenance Section -->
        <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
            <div class="px-3 py-2">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Maintenance Mode</span>
                    <form action="{{ route('maintenance.toggle') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" 
                                class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 
                                {{ \App\Models\MaintenanceSetting::where('key', 'maintenance_mode')->first()?->value === 'true' 
                                    ? 'bg-purple-600' 
                                    : 'bg-gray-200 dark:bg-gray-700' }}">
                            <span class="translate-x-0 pointer-events-none relative inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out
                                {{ \App\Models\MaintenanceSetting::where('key', 'maintenance_mode')->first()?->value === 'true' 
                                    ? 'translate-x-5' 
                                    : 'translate-x-0' }}">
                                <span class="opacity-0 duration-100 ease-in transition
                                    {{ \App\Models\MaintenanceSetting::where('key', 'maintenance_mode')->first()?->value === 'true' 
                                        ? 'opacity-100' 
                                        : 'opacity-0' }}">
                                    <i class="fas fa-check text-xs text-purple-600"></i>
                                </span>
                            </span>
                        </button>
                    </form>
                </div>
                
                <form action="{{ route('maintenance.message') }}" method="POST">
                    @csrf
                    <textarea name="message" 
                              rows="3" 
                              class="w-full text-sm rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-purple-500 focus:ring-purple-500"
                              placeholder="Enter maintenance message">{{ \App\Models\MaintenanceSetting::where('key', 'maintenance_message')->first()?->value }}</textarea>
                    <button type="submit" 
                            class="mt-2 w-full inline-flex justify-center items-center px-3 py-2 text-sm font-medium text-white bg-purple-600 rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        <i class="fas fa-save mr-2"></i>
                        Update Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

