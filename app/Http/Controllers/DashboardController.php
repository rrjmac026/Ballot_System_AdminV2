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
            'castedVotesCount' => CastedVote::count(),
            'usersCount' => \App\Models\User::count() // Add this line
        ];

        // Voting statistics
        $data['votingStats'] = [
            'totalEligibleVoters' => Voter::where('status', 'Active')->count(),
            'totalVoted' => CastedVote::distinct('voter_id')->count(),
            'votingPercentage' => $this->calculateVotingPercentage(),
        ];

        // Recent voting activity - modified to show unique transactions
        $data['recentVotes'] = CastedVote::with(['voter', 'position'])
            ->select('transaction_number', 'voter_id', 'voted_at')
            ->distinct('transaction_number')
            ->latest('voted_at')
            ->take(5)
            ->get();

        // Voting progress by college
        $data['collegeProgress'] = $this->getCollegeVotingProgress();

        // Add email statistics
        $data['emailStats'] = [
            'totalEmails' => EmailLog::count(),
            'successfulEmails' => EmailLog::where('status', 'sent')->count(),
            'failedEmails' => EmailLog::where('status', 'failed')->count(),
            'todayEmails' => EmailLog::whereDate('created_at', today())->count()
        ];

        // Get presidential rankings
        $presidentialPosition = Position::where('name', 'like', '%president%')
            ->orWhere('name', 'like', '%President%')
            ->first();

        if ($presidentialPosition) {
            $data['presidentialRankings'] = Candidate::where('position_id', $presidentialPosition->position_id)
                ->withCount(['castedVotes'])
                ->orderByDesc('casted_votes_count')
                ->with(['partylist', 'college'])
                ->take(3)
                ->get();
        } else {
            $data['presidentialRankings'] = collect();
        }

        // Add vice presidential rankings
        $vicePresidentialPosition = Position::where('name', 'like', '%vice president%')
            ->orWhere('name', 'like', '%Vice President%')
            ->first();

        if ($vicePresidentialPosition) {
            $data['vicePresidentialRankings'] = Candidate::where('position_id', $vicePresidentialPosition->position_id)
                ->withCount(['castedVotes'])
                ->orderByDesc('casted_votes_count')
                ->with(['partylist', 'college'])
                ->take(3)
                ->get();
        } else {
            $data['vicePresidentialRankings'] = collect();
        }

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
