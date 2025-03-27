<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\College;
use App\Models\CastedVote;
use App\Models\Voter;
use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        $colleges = College::select('name', 'acronym')->get();
        $data = $this->getReportData();
        $data['colleges'] = $colleges;
        return view('reports.index', $data);
    }

    public function generatePDF(Request $request)
    {
        $type = $request->type ?? 'all';
        $college = $request->college;
        
        if ($type === 'ssc') {
            $data = $this->getSSCReportData();
            $view = 'reports.pdf-ssc';
            $filename = 'ssc_election_results';
        } elseif ($type === 'sbo') {
            $data = $this->getSBOReportData($college);
            $view = 'reports.pdf-sbo';
            $filename = strtolower($college) . '_election_results';
        } else {
            $data = $this->getReportData();
            $view = 'reports.pdf';
            $filename = 'election_results';
        }

        // Generate PDF using Spatie's PDF without browser dependencies
        return Pdf::view($view, $data)
            ->format('a4')
            ->margins(15, 15, 15, 15)
            ->userPassword(false) // No password protection
            ->name($filename . '_' . now()->format('Y-m-d') . '.pdf')
            ->download();
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

    private function getSSCReportData()
    {
        // Get SSC positions (President, VP, Senators)
        $positions = Position::whereIn('position_id', [1, 2, 3])
            ->with(['candidates' => function($query) {
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

        return [
            'positions' => $positions,
            'totalVoters' => \App\Models\Voter::where('status', 'Active')->count(),
            'totalVoted' => CastedVote::distinct('voter_id')->count(),
            'generatedAt' => now()->format('F j, Y h:i A')
        ];
    }

    private function getSBOReportData($college)
    {
        // Get college info
        $collegeInfo = College::where('acronym', $college)->firstOrFail();

        // Get SBO positions (4-14: Governor to Representatives)
        $positions = Position::whereIn('position_id', range(4, 14))
            ->with(['candidates' => function($query) use ($collegeInfo) {
                $query->where('college_id', $collegeInfo->college_id)
                    ->selectRaw('candidates.*, (
                        SELECT COUNT(*)
                        FROM casted_votes
                        WHERE casted_votes.candidate_id = candidates.candidate_id
                        AND casted_votes.position_id = candidates.position_id
                    ) as vote_count')
                    ->with(['partylist', 'college'])
                    ->orderByDesc('vote_count');
            }])
            ->get()
            ->filter(function($position) {
                return $position->candidates->isNotEmpty();
            });

        // Get voters from this college
        $collegeVoters = Voter::where('college_id', $collegeInfo->college_id)
            ->where('status', 'Active');

        return [
            'college' => $collegeInfo,
            'positions' => $positions,
            'totalVoters' => $collegeVoters->count(),
            'totalVoted' => CastedVote::whereIn('voter_id', $collegeVoters->pluck('voter_id'))
                ->distinct('voter_id')
                ->count(),
            'generatedAt' => now()->format('F j, Y h:i A')
        ];
    }
}
