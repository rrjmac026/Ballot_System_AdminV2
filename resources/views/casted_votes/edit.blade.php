@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Edit Vote Record</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Modify voting information</p>
        </div>
        <a href="{{ route('casted_votes.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition duration-200 shadow-md hover:shadow-lg">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to List
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
        <form action="{{ route('casted_votes.update', $castedVote) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Form fields with improved styling -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Voter</label>
                    <select name="voter_id" class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-purple-500 focus:ring-purple-500" required>
                        @foreach($voters as $voter)
                            <option value="{{ $voter->voter_id }}" {{ $castedVote->voter_id == $voter->voter_id ? 'selected' : '' }}>
                                {{ $voter->name }} ({{ $voter->student_id }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Candidate</label>
                    <select name="candidate_id" class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-purple-500 focus:ring-purple-500" required>
                        @foreach($candidates as $candidate)
                            <option value="{{ $candidate->candidate_id }}" {{ $castedVote->candidate_id == $candidate->candidate_id ? 'selected' : '' }}>
                                {{ $candidate->first_name }} {{ $candidate->last_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Position</label>
                    <select name="position_id" class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-purple-500 focus:ring-purple-500" required>
                        @foreach($positions as $position)
                            <option value="{{ $position->position_id }}" {{ $castedVote->position_id == $position->position_id ? 'selected' : '' }}>
                                {{ $position->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Election Type</label>
                    <input type="text" name="election_type" class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-purple-500 focus:ring-purple-500" value="{{ $castedVote->election_type }}" required>
                </div>
                <div class="col-span-2 flex justify-end space-x-4">
                    <button type="reset" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition duration-200">
                        Reset Changes
                    </button>
                    <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition duration-200 flex items-center">
                        <i class="fas fa-save mr-2"></i>
                        Update Vote
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
