@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Election Rankings</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Current standing of candidates per position</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($positionRankings as $ranking)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <div class="p-4 bg-blue-50 dark:bg-blue-900/20">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                    {{ $ranking['position']->name }}
                </h3>
            </div>
            <div class="p-4">
                @foreach($ranking['candidates'] as $index => $candidate)
                <div class="mb-4 last:mb-0">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center">
                            <span class="w-8 h-8 rounded-full bg-{{ $index === 0 ? 'yellow' : 'gray' }}-100 dark:bg-{{ $index === 0 ? 'yellow' : 'gray' }}-800 flex items-center justify-center text-{{ $index === 0 ? 'yellow' : 'gray' }}-800 dark:text-{{ $index === 0 ? 'yellow' : 'gray' }}-200 font-bold">
                                #{{ $index + 1 }}
                            </span>
                            <span class="ml-3 text-gray-700 dark:text-gray-300">
                                {{ $candidate->first_name }} {{ $candidate->last_name }}
                            </span>
                        </div>
                        <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full text-sm">
                            {{ $candidate->casted_votes_count }} votes
                        </span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        @php
                            $percentage = $ranking['candidates']->first()->casted_votes_count > 0
                                ? ($candidate->casted_votes_count / $ranking['candidates']->first()->casted_votes_count) * 100
                                : 0;
                        @endphp
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $percentage }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
