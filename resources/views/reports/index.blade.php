@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Election Results Report</h2>
        <a href="{{ route('reports.pdf') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
            Download PDF
        </a>
    </div>

    <!-- Voting Summary -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-6">
        <h3 class="text-lg font-semibold mb-4">Voting Summary</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-gray-600 dark:text-gray-400">Total Eligible Voters: {{ $totalVoters }}</p>
                <p class="text-gray-600 dark:text-gray-400">Total Votes Cast: {{ $totalVoted }}</p>
                <p class="text-gray-600 dark:text-gray-400">Voter Turnout: {{ round(($totalVoted / $totalVoters) * 100, 2) }}%</p>
            </div>
            <div>
                <p class="text-gray-600 dark:text-gray-400">Report Generated: {{ $generatedAt }}</p>
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
