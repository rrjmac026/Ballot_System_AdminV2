@if($candidates && $candidates->isNotEmpty())
    @foreach($candidates as $index => $candidate)
        @if($candidate)
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
                            {{ $candidate->first_name ?? 'N/A' }} {{ $candidate->last_name ?? '' }}
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
    @endforeach
@else
    <p class="text-gray-500 dark:text-gray-400 text-center">No rankings available.</p>
@endif
