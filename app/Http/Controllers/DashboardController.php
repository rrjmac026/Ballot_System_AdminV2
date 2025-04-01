<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use App\Models\Position;
use App\Models\Candidate;
use App\Models\College;
use App\Models\Organization;
use App\Models\Partylist;
use App\Models\CastedVote;
use App\Models\EmailLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Basic counts
        $data = [
            'votersCount' => Voter::count(),
            'activeVotersCount' => Voter::where('status', 'Active')->count(),
            'positionsCount' => Position::count(),
            'candidatesCount' => Candidate::count(),
            'collegesCount' => College::count(),
            'organizationsCount' => Organization::count(),
            'partylistsCount' => Partylist::count(),
            'castedVotesCount' => CastedVote::distinct('voter_id')->count(), // Changed to count unique voters
            'usersCount' => \App\Models\User::count()
        ];

        // Voting statistics - also based on unique voters
        $data['votingStats'] = [
            'totalEligibleVoters' => Voter::where('status', 'Active')->count(),
            'totalVoted' => CastedVote::distinct('voter_id')->count(),
            'votingPercentage' => $this->calculateVotingPercentage(),
        ];

        // Recent voting activity - modified to show unique transactions
        $data['recentVotes'] = CastedVote::with(['voter.college'])
            ->select('transaction_number', 'voter_id', 'voted_at')
            ->groupBy('transaction_number', 'voter_id', 'voted_at')
            ->orderByDesc('voted_at')
            ->limit(5)
            ->get();

        $data['recentVotesDetails'] = CastedVote::with(['position', 'candidate'])
            ->whereIn('transaction_number', $data['recentVotes']->pluck('transaction_number'))
            ->get()
            ->groupBy('transaction_number');

        $data['votingData'] = CastedVote::with(['voter.college', 'candidate', 'position'])
            ->select('transaction_number', 'voter_id', 'voted_at', 'position_id', 'candidate_id')
            ->distinct('transaction_number')
            ->latest('voted_at')
            ->get()
            ->groupBy('transaction_number')
            ->map(function($votes) {
                $first = $votes->first();
                $first->voting_details = $votes->map(function($vote) {
                    return [
                        'position' => $vote->position,
                        'candidate' => $vote->candidate
                    ];
                });
                return $first;
            })->values();

        // Voting progress by college
        $data['collegeProgress'] = $this->getCollegeVotingProgress();

        // Add email statistics
        $data['emailStats'] = [
            'totalEmails' => EmailLog::count(),
            'successfulEmails' => EmailLog::where('status', 'sent')->count(),
            'failedEmails' => EmailLog::where('status', 'failed')->count(),
            'todayEmails' => EmailLog::whereDate('created_at', today())->count()
        ];

        // Get presidential rankings with better null checks
        $data['presidentialRankings'] = Candidate::with(['partylist', 'college'])
            ->where('position_id', 1)
            ->whereNotNull('first_name')
            ->whereNotNull('last_name')
            ->select('candidates.*')
            ->selectRaw('COALESCE((
                SELECT COUNT(*)
                FROM casted_votes
                WHERE casted_votes.candidate_id = candidates.candidate_id
                AND casted_votes.position_id = candidates.position_id
            ), 0) as casted_votes_count')
            ->orderByDesc('casted_votes_count')
            ->limit(3)
            ->get()
            ->filter(function($candidate) {
                return $candidate && $candidate->partylist && $candidate->college;
            });

        // Vice presidential rankings with same null checks
        $data['vicePresidentialRankings'] = Candidate::with(['partylist', 'college'])
            ->where('position_id', 2)
            ->whereNotNull('first_name')
            ->whereNotNull('last_name')
            ->select('candidates.*')
            ->selectRaw('COALESCE((
                SELECT COUNT(*)
                FROM casted_votes
                WHERE casted_votes.candidate_id = candidates.candidate_id
                AND casted_votes.position_id = candidates.position_id
            ), 0) as casted_votes_count')
            ->orderByDesc('casted_votes_count')
            ->limit(3)
            ->get()
            ->filter(function($candidate) {
                return $candidate && $candidate->partylist && $candidate->college;
            });

        return view('dashboard', $data);
    }

    private function calculateVotingPercentage()
    {
        $totalEligible = Voter::where('status', 'Active')->count();
        if ($totalEligible === 0) return 0;

        $totalVoted = CastedVote::distinct('voter_id')->count();
        return round(($totalVoted / $totalEligible) * 100, 2);
    }

    private function getCollegeVotingProgress()
    {
        return College::with(['voters' => function ($query) {
            $query->where('status', 'Active');
        }])
        ->get()
        ->map(function ($college) {
            $totalVoters = $college->voters->count();
            $votedCount = CastedVote::whereIn('voter_id', $college->voters->pluck('voter_id'))->distinct('voter_id')->count();
            
            return [
                'name' => $college->name,
                'totalVoters' => $totalVoters,
                'votedCount' => $votedCount,
                'percentage' => $totalVoters > 0 ? round(($votedCount / $totalVoters) * 100, 2) : 0
            ];
        });
    }
}
