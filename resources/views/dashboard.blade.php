@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Dashboard Overview</h3>

    <!-- Statistics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Voters Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-500 bg-opacity-10">
                    <i class="fas fa-users text-blue-500 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm">Total Voters</h3>
                    <div class="flex items-center">
                        <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">{{ $votersCount }}</p>
                        <span class="ml-2 text-sm text-green-500">({{ $activeVotersCount }} active)</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cast Votes Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-500 bg-opacity-10">
                    <i class="fas fa-vote-yea text-green-500 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm">Cast Votes</h3>
                    <div class="flex items-center">
                        <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">{{ $castedVotesCount }}</p>
                        <span class="ml-2 text-sm text-blue-500">{{ $votingStats['votingPercentage'] }}% turnout</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Candidates Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-500 bg-opacity-10">
                    <i class="fas fa-user-tie text-purple-500 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm">Candidates</h3>
                    <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">{{ $candidatesCount }}</p>
                </div>
            </div>
        </div>

        <!-- Positions Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-500 bg-opacity-10">
                    <i class="fas fa-sitemap text-yellow-500 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm">Positions</h3>
                    <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200">{{ $positionsCount }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- College Progress Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Voting Progress by College</h4>
            <div class="space-y-4">
                @foreach($collegeProgress as $progress)
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $progress['name'] }}</span>
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $progress['percentage'] }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $progress['percentage'] }}%"></div>
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                        {{ $progress['votedCount'] }} of {{ $progress['totalVoters'] }} voters
                    </p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Recent Voting Activity</h4>
            <div class="space-y-4">
                @foreach($recentVotes as $vote)
                <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                    <div class="p-2 rounded-full bg-green-100 dark:bg-green-900">
                        <i class="fas fa-check text-green-500 dark:text-green-400"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ $vote->voter->name }}
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            Voted for {{ $vote->position->name }} position
                            <span class="ml-2">{{ $vote->voted_at->diffForHumans() }}</span>
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
