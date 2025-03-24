@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <form action="{{ route('casted_votes.store') }}" method="POST">
        @csrf
        <div class="space-y-6">
            <!-- Voter Selection -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Select Voter</label>
                <select name="voter_id" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700">
                    @foreach($voters as $voter)
                        <option value="{{ $voter->voter_id }}">{{ $voter->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Position and Candidate Selection -->
            @foreach($positions as $position)
            <div class="border p-4 rounded">
                <h3 class="font-medium mb-2">{{ $position->name }}</h3>
                <select name="votes[{{ $loop->index }}][position_id]" hidden>
                    <option value="{{ $position->position_id }}" selected>{{ $position->name }}</option>
                </select>
                
                <select name="votes[{{ $loop->index }}][candidate_id]" class="block w-full rounded-md border-gray-300">
                    <option value="">Select Candidate</option>
                    @foreach($candidates->where('position_id', $position->position_id) as $candidate)
                        <option value="{{ $candidate->candidate_id }}">
                            {{ $candidate->first_name }} {{ $candidate->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @endforeach

            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Submit All Votes
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
