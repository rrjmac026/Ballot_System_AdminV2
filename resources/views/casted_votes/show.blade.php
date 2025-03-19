@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Vote Details</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">View complete voting record</p>
        </div>
        <div class="flex space-x-4">
            <a href="{{ route('casted_votes.edit', $castedVote) }}" 
               class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                <i class="fas fa-edit mr-2"></i>
                Edit
            </a>
            <a href="{{ route('casted_votes.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to List
            </a>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Voter Information -->
                <div class="col-span-2">
                    <div class="flex items-center p-4 bg-purple-50 dark:bg-purple-900/20 rounded-lg">
                        <div class="p-3 rounded-full bg-purple-100 dark:bg-purple-900">
                            <i class="fas fa-user text-purple-500 dark:text-purple-400 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                                {{ $castedVote->voter->name }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400">Voter ID: {{ $castedVote->voter->student_id }}</p>
                        </div>
                    </div>
                </div>

                <!-- Vote Details -->
                <div class="col-span-2">
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <h4 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-4">Vote Information</h4>
                        <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Candidate</dt>
                                <dd class="mt-1 text-gray-900 dark:text-gray-100">
                                    {{ $castedVote->candidate->first_name }} {{ $castedVote->candidate->last_name }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Position</dt>
                                <dd class="mt-1 text-gray-900 dark:text-gray-100">
                                    {{ $castedVote->position->name }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Election Type</dt>
                                <dd class="mt-1 text-gray-900 dark:text-gray-100">
                                    {{ $castedVote->election_type }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Vote Cast Date</dt>
                                <dd class="mt-1 text-gray-900 dark:text-gray-100">
                                    {{ $castedVote->created_at->format('F d, Y h:i A') }}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
