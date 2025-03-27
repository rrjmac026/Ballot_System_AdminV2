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
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm">Voters Who Cast</h3>
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

        <!-- Presidential Rankings Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 lg:col-span-2">
            <h3 class="text-gray-500 dark:text-gray-400 text-sm mb-4">Presidential Rankings</h3>
            @forelse($presidentialRankings as $index => $candidate)
                @if($candidate && $candidate->first_name)
                    <div class="flex items-center mb-3 last:mb-0">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 rounded-full bg-{{ $index === 0 ? 'yellow' : 'gray' }}-100 dark:bg-{{ $index === 0 ? 'yellow' : 'gray' }}-800 flex items-center justify-center">
                                <span class="text-{{ $index === 0 ? 'yellow' : 'gray' }}-800 dark:text-{{ $index === 0 ? 'yellow' : 'gray' }}-200 font-bold">#{{ $index + 1 }}</span>
                            </div>
                        </div>
                        <div class="ml-3 flex-grow">
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $candidate->first_name }} {{ $candidate->last_name }}
                                    </span>
                                    <span class="text-xs text-gray-500 dark:text-gray-400 ml-2">
                                        {{ optional($candidate->partylist)->acronym ?? 'N/A' }}
                                    </span>
                                </div>
                                <span class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ $candidate->casted_votes_count ?? 0 }} votes
                                </span>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <p class="text-gray-500 dark:text-gray-400 text-center">No presidential candidates found.</p>
            @endforelse
        </div>

        <!-- Vice Presidential Rankings Card -->
       <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 lg:col-span-2">
            <h3 class="text-gray-500 dark:text-gray-400 text-sm mb-4">Vice Presidential Rankings</h3>
            @forelse($vicePresidentialRankings as $index => $candidate)
                <div class="flex items-center mb-3 last:mb-0">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 rounded-full bg-{{ $index === 0 ? 'yellow' : 'gray' }}-100 dark:bg-{{ $index === 0 ? 'yellow' : 'gray' }}-800 flex items-center justify-center">
                            <span class="text-{{ $index === 0 ? 'yellow' : 'gray' }}-800 dark:text-{{ $index === 0 ? 'yellow' : 'gray' }}-200 font-bold">#{{ $index + 1 }}</span>
                        </div>
                    </div>
                    <div class="ml-3 flex-grow">
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $candidate->first_name }} {{ $candidate->last_name }}</span>
                                <span class="text-xs text-gray-500 dark:text-gray-400 ml-2">{{ optional($candidate->partylist)->acronym }}</span>
                            </div>
                            <span class="text-sm text-gray-600 dark:text-gray-400">{{ $candidate->casted_votes_count }} votes</span>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 dark:text-gray-400 text-center">No vice presidential candidates found.</p>
            @endforelse
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
                            {{ $vote->transaction_number }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    
</div>
@endsection
