<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\College;
use App\Models\CastedVote;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        $data = $this->getReportData();
        return view('reports.index', $data);
    }

    public function generatePDF()
    {
        $data = $this->getReportData();
        $pdf = PDF::loadView('reports.pdf', $data);
        return $pdf->download('election_results_' . now()->format('Y-m-d') . '.pdf');
    }

    private function getReportData()
    {
        // Get positions with candidates and their vote counts
        $positions = Position::with(['candidates' => function($query) {
            $query->select('candidates.*')
                ->selectRaw('(
                    SELECT COUNT(*)
                    FROM casted_votes
                    WHERE casted_votes.candidate_id = candidates.candidate_id
                    AND casted_votes.position_id = candidates.position_id
                ) as vote_count')
                ->with(['partylist', 'college'])
                ->orderByDesc('vote_count');
        }])->orderBy('position_order')->get();

        // Get college voting statistics
        $collegeStats = College::with(['voters' => function ($query) {
            $query->where('status', 'Active');
        }])
        ->get()
        ->map(function ($college) {
            $totalVoters = $college->voters->count();
            $votedCount = CastedVote::whereIn('voter_id', $college->voters->pluck('voter_id'))
                ->distinct('voter_id')
                ->count();
            
            return [
                'name' => $college->name,
                'totalVoters' => $totalVoters,
                'votedCount' => $votedCount,
                'percentage' => $totalVoters > 0 ? round(($votedCount / $totalVoters) * 100, 2) : 0
            ];
        });

        return [
            'positions' => $positions,
            'collegeStats' => $collegeStats,
            'totalVoters' => \App\Models\Voter::where('status', 'Active')->count(),
            'totalVoted' => CastedVote::distinct('voter_id')->count(),
            'generatedAt' => now()->format('F j, Y h:i A')
        ];
    }
}
