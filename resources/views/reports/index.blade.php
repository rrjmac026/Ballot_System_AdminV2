@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Election Results Reports</h2>
            <p class="mt-2 text-gray-600 dark:text-gray-400">Generate and download election results reports</p>
        </div>
    </div>

    <!-- Report Type Selection -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
        <!-- SSC Report Card -->
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/50 dark:to-blue-800/50 rounded-2xl shadow-lg p-8 border border-blue-200 dark:border-blue-700">
            <div class="flex items-center gap-4 mb-6">
                <div class="p-3 bg-blue-600 rounded-lg text-white">
                    <i class="fas fa-university text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-blue-900 dark:text-blue-100">Supreme Student Council (SSC)</h3>
                    <p class="text-blue-700 dark:text-blue-300 text-sm">University-wide positions</p>
                </div>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-6">Generate a comprehensive report for university-wide positions including President, Vice-President, and Senators.</p>
            <a href="{{ route('reports.pdf', ['type' => 'ssc']) }}" 
               class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                <i class="fas fa-download mr-2"></i>
                Download SSC Report
            </a>
        </div>

        <!-- SBO Reports Card -->
        <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/50 dark:to-purple-800/50 rounded-2xl shadow-lg p-8 border border-purple-200 dark:border-purple-700">
            <div class="flex items-center gap-4 mb-6">
                <div class="p-3 bg-purple-600 rounded-lg text-white">
                    <i class="fas fa-users text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-purple-900 dark:text-purple-100">Student Body Organization (SBO)</h3>
                    <p class="text-purple-700 dark:text-purple-300 text-sm">College-specific positions</p>
                </div>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-6">Select a college to generate its specific SBO election results report.</p>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                @foreach($colleges as $college)
                <a href="{{ route('reports.pdf', ['type' => 'sbo', 'college' => $college->acronym]) }}" 
                   class="inline-flex items-center justify-center px-4 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                    <span class="font-semibold">{{ $college->acronym }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <div class="p-3 rounded-lg bg-green-100 dark:bg-green-900">
                    <i class="fas fa-users text-green-600 dark:text-green-400"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Voters</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($totalVoters) }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <div class="p-3 rounded-lg bg-blue-100 dark:bg-blue-900">
                    <i class="fas fa-vote-yea text-blue-600 dark:text-blue-400"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Votes Cast</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($totalVoted) }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <div class="p-3 rounded-lg bg-yellow-100 dark:bg-yellow-900">
                    <i class="fas fa-percentage text-yellow-600 dark:text-yellow-400"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Voter Turnout</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ round(($totalVoted / $totalVoters) * 100, 2) }}%</p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <div class="p-3 rounded-lg bg-red-100 dark:bg-red-900">
                    <i class="fas fa-calendar-alt text-red-600 dark:text-red-400"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Report Generated</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $generatedAt }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Results by Position -->
    @foreach($positions as $position)
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-6">
        <h3 class="text-lg font-semibold mb-4">{{ $position->name }} Results</h3>
        <div class="space-y-4">
            @foreach($position->candidates as $candidate)
            <div>
                <div class="flex justify-between mb-1">
                    <span class="text-gray-700 dark:text-gray-300">
                        {{ $candidate->first_name }} {{ $candidate->last_name }}
                        <span class="text-sm text-gray-500">({{ $candidate->partylist->acronym }})</span>
                    </span>
                    <span class="text-gray-700 dark:text-gray-300">{{ $candidate->vote_count }} votes</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                    @php
                        $percentage = $position->candidates->first()->vote_count > 0 
                            ? ($candidate->vote_count / $position->candidates->first()->vote_count) * 100 
                            : 0;
                    @endphp
                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $percentage }}%"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach

    <!-- College Statistics -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold mb-4">Voter Turnout by College</h3>
        <div class="space-y-4">
            @foreach($collegeStats as $stat)
            <div>
                <div class="flex justify-between mb-1">
                    <span class="text-gray-700 dark:text-gray-300">{{ $stat['name'] }}</span>
                    <span class="text-gray-700 dark:text-gray-300">{{ $stat['percentage'] }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                    <div class="bg-green-600 h-2.5 rounded-full" style="width: {{ $stat['percentage'] }}%"></div>
                </div>
                <p class="text-sm text-gray-500 mt-1">{{ $stat['votedCount'] }} of {{ $stat['totalVoters'] }} voters</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
