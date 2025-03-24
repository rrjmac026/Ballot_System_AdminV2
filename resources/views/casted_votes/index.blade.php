@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Voting Records</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">View election participation records</p>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Transaction ID
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Voter Info
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Timestamp
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Details
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($castedVotes as $vote)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-600 dark:text-blue-400">
                        {{ $vote->transaction_number }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        {{ $vote->voter_type }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        {{ $vote->voted_at->format('M d, Y h:i A') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        <button onclick="showDetails('{{ $vote->transaction_number }}')" class="text-blue-600 hover:text-blue-800 dark:text-blue-400">
                            View Details
                        </button>
                    </td>
                </tr>
                @if(isset($votingDetails[$vote->transaction_number]))
                <tr class="hidden" id="details-{{ $vote->transaction_number }}">
                    <td colspan="4" class="px-6 py-4 bg-gray-50 dark:bg-gray-700">
                        <div class="space-y-2">
                            @foreach($votingDetails[$vote->transaction_number] as $detail)
                            <div class="text-sm text-gray-600 dark:text-gray-300">
                                {{ $detail->candidate_details }}
                            </div>
                            @endforeach
                        </div>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
            {{ $castedVotes->links() }}
        </div>
    </div>
</div>

<script>
function showDetails(transactionNumber) {
    const detailsRow = document.getElementById(`details-${transactionNumber}`);
    detailsRow.classList.toggle('hidden');
}
</script>
@endsection
