@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="mb-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Vote Details</h2>
            <a href="{{ route('casted_votes.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition duration-200">
                <i class="fas fa-arrow-left mr-2"></i> Back to List
            </a>
        </div>
        <p class="text-gray-600 dark:text-gray-400 mt-1">Transaction ID: {{ $transaction->transaction_number }}</p>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
        <div class="p-6">
            <!-- Voter Information -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Voter Information</h3>
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <p class="text-gray-600 dark:text-gray-400">{{ $transaction->voter_type }}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-500 mt-1">
                        Voted on {{ $transaction->voted_at->format('F d, Y h:i A') }}
                    </p>
                </div>
            </div>

            <!-- Voting Details -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Votes Cast</h3>
                <div class="space-y-4">
                    @foreach($votingDetails as $vote)
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Position: {{ $vote->position->name }}
                                </span>
                                <p class="text-gray-600 dark:text-gray-400 mt-1">
                                    {{ $vote->candidate_details }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
