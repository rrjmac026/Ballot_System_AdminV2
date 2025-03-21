<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\CastedVote;
use App\Models\Candidate;
use Illuminate\Support\Facades\DB;

class RankingsController extends Controller
{
    public function index()
    {
        $positionRankings = Position::with(['candidates'])
            ->get()
            ->map(function ($position) {
                $candidateVotes = Candidate::where('position_id', $position->position_id)
                    ->withCount(['castedVotes'])
                    ->orderByDesc('casted_votes_count')
                    ->get();

                return [
                    'position' => $position,
                    'candidates' => $candidateVotes
                ];
            });

        return view('rankings.index', compact('positionRankings'));
    }
}
