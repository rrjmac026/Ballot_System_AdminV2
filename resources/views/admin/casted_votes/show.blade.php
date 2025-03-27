@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Vote Details</h3>
        <a href="{{ route('casted_votes.index') }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400">
            <i class="fas fa-arrow-left mr-2"></i> Back to List
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h4 class="font-semibold text-gray-800 dark:text-gray-200 mb-4">Transaction Information</h4>
                <p class="text-gray-600 dark:text-gray-400">
                    <span class="font-medium">Transaction Number:</span> {{ $transaction_number }}
                </p>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    <span class="font-medium">Voted At:</span> {{ $votes->first()->voted_at->format('F j, Y g:i A') }}
                </p>
            </div>
            <div>
                <h4 class="font-semibold text-gray-800 dark:text-gray-200 mb-4">Voter Information</h4>
                <p class="text-gray-600 dark:text-gray-400">
                    <span class="font-medium">Name:</span> {{ $voter->first_name }} {{ $voter->last_name }}
                </p>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    <span class="font-medium">College:</span> {{ $voter->college->name }}
                </p>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    <span class="font-medium">Year Level:</span> {{ $voter->year_level }}
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Position</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Candidate</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Partylist</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($votes as $vote)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                        {{ $vote->position->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                        {{ $vote->candidate->first_name }} {{ $vote->candidate->last_name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                        {{ $vote->candidate->partylist->acronym }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
