<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Candidate;
use App\Models\CastedVote;
use Illuminate\Support\Facades\DB;

class RankingsController extends Controller
{
    public function index()
    {
        $positions = Position::all();
        $rankings = [];

        foreach ($positions as $position) {
            $candidates = Candidate::where('position_id', $position->position_id)
                ->get()
                ->map(function ($candidate) {
                    $candidate->vote_count = $candidate->casted_votes_count;
                    return $candidate;
                })
                ->sortByDesc('vote_count')
                ->take(3);

            if ($candidates->isNotEmpty()) {
                $rankings[$position->name] = $candidates;
            }
        }

        return view('rankings.index', compact('rankings'));
    }
}
