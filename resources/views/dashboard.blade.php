@extends('layouts.app')
@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Dashboard</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Users Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-500 bg-opacity-10">
                            <i class="fas fa-users text-blue-500 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-500 dark:text-gray-400 text-sm">Users</h3>
                            <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                {{ $usersCount }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Organizations Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-500 bg-opacity-10">
                            <i class="fas fa-building text-green-500 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-500 dark:text-gray-400 text-sm">Organizations</h3>
                            <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                {{ $organizationsCount }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Positions Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-500 bg-opacity-10">
                            <i class="fas fa-user-tie text-purple-500 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-500 dark:text-gray-400 text-sm">Positions</h3>
                            <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                {{ $positionsCount }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Candidates Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-500 bg-opacity-10">
                            <i class="fas fa-user-graduate text-yellow-500 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-500 dark:text-gray-400 text-sm">Candidates</h3>
                            <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                {{ $candidatesCount }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Voters Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-red-500 bg-opacity-10">
                            <i class="fas fa-person-booth text-red-500 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-500 dark:text-gray-400 text-sm">Voters</h3>
                            <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                {{ $votersCount }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Colleges Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-indigo-500 bg-opacity-10">
                            <i class="fas fa-university text-indigo-500 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-500 dark:text-gray-400 text-sm">Colleges</h3>
                            <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                {{ $collegesCount }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Partylists Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-pink-500 bg-opacity-10">
                            <i class="fas fa-flag text-pink-500 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-500 dark:text-gray-400 text-sm">Partylists</h3>
                            <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                {{ $partylistsCount }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Casted Votes Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-teal-500 bg-opacity-10">
                            <i class="fas fa-vote-yea text-teal-500 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-500 dark:text-gray-400 text-sm">Casted Votes</h3>
                            <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                {{ $castedVotesCount }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Section -->
            <div class="mt-8">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Recent Activity</h3>
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                    <div class="space-y-4">
                        <!-- Recent Votes -->
                        <div>
                            <h4 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">Latest Votes</h4>
                            @foreach(\App\Models\CastedVote::latest()->take(5)->get() as $vote)
                            <div class="flex items-center py-2 border-b border-gray-200 dark:border-gray-700">
                                <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                <span class="text-gray-600 dark:text-gray-400">
                                    Vote cast for {{ $vote->candidate->first_name }} {{ $vote->candidate->last_name }}
                                    ({{ $vote->position->name }})
                                </span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
