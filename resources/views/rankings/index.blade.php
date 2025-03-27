@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Election Rankings</h2>
        <p class="text-gray-600 dark:text-gray-400 mt-1">Current standings for all positions</p>
    </div>

    @if($rankings->isEmpty())
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
            <p class="text-gray-600 dark:text-gray-400 text-center">No rankings available at the moment.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($rankings as $position => $candidates)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">{{ $position }}</h3>
                    
                    @if($candidates->isEmpty())
                        <p class="text-gray-600 dark:text-gray-400 text-center">No candidates for this position.</p>
                    @else
                        @foreach($candidates as $index => $candidate)
                        <div class="flex items-center mb-4 last:mb-0">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-full bg-{{ $index === 0 ? 'yellow' : 'gray' }}-100 dark:bg-{{ $index === 0 ? 'yellow' : 'gray' }}-800 flex items-center justify-center">
                                    <span class="text-{{ $index === 0 ? 'yellow' : 'gray' }}-800 dark:text-{{ $index === 0 ? 'yellow' : 'gray' }}-200 font-bold">#{{ $index + 1 }}</span>
                                </div>
                            </div>
                            <div class="ml-4 flex-grow">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                            {{ $candidate->first_name }} {{ $candidate->last_name }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ $candidate->partylist->acronym }} - {{ $candidate->college->acronym }}
                                        </p>
                                    </div>
                                    <span class="text-sm font-medium text-gray-600 dark:text-gray-300">
                                        {{ $candidate->vote_count }} votes
                                    </span>
                                </div>
                                <div class="mt-2 w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-700">
                                    @php
                                        $maxVotes = $candidates->first()->vote_count;
                                        $percentage = $maxVotes > 0 ? ($candidate->vote_count / $maxVotes) * 100 : 0;
                                    @endphp
                                    <div class="bg-blue-600 h-1.5 rounded-full" style="width: {{ $percentage }}%"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
