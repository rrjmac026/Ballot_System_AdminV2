<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\CastedVote;
use App\Models\Position;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $positions = Position::all();
        $organizations = Organization::all();
        
        // Get vote counts by position
        $positionResults = CastedVote::select('positions.name', DB::raw('COUNT(*) as vote_count'))
            ->join('positions', 'casted_votes.position_id', '=', 'positions.position_id')
            ->groupBy('positions.position_id', 'positions.name')
            ->get();

        // Get winning candidates by position
        $winners = CastedVote::select(
            'positions.name as position',
            'candidates.first_name',
            'candidates.last_name',
            DB::raw('COUNT(*) as vote_count')
        )
            ->join('positions', 'casted_votes.position_id', '=', 'positions.position_id')
            ->join('candidates', 'casted_votes.candidate_id', '=', 'candidates.candidate_id')
            ->groupBy('positions.position_id', 'positions.name', 'candidates.candidate_id', 'candidates.first_name', 'candidates.last_name')
            ->orderByRaw('positions.position_id, COUNT(*) DESC')
            ->get();

        return view('reports.index', compact('positionResults', 'winners', 'positions', 'organizations'));
    }

    public function generatePDF()
    {
        $positions = Position::all();
        
        $positionResults = CastedVote::select('positions.name', DB::raw('COUNT(*) as vote_count'))
            ->join('positions', 'casted_votes.position_id', '=', 'positions.position_id')
            ->groupBy('positions.position_id', 'positions.name')
            ->get();

        $winners = CastedVote::select(
            'positions.name as position',
            'candidates.first_name',
            'candidates.last_name',
            DB::raw('COUNT(*) as vote_count')
        )
            ->join('positions', 'casted_votes.position_id', '=', 'positions.position_id')
            ->join('candidates', 'casted_votes.candidate_id', '=', 'candidates.candidate_id')
            ->groupBy('positions.position_id', 'positions.name', 'candidates.candidate_id', 'candidates.first_name', 'candidates.last_name')
            ->orderByRaw('positions.position_id, COUNT(*) DESC')
            ->get()
            ->groupBy('position');

        $pdf = PDF::loadView('reports.pdf', compact('positionResults', 'winners'));
        return $pdf->download('election_results.pdf');
    }
}
