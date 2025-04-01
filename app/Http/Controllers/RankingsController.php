<?php
namespace App\Http\Controllers;

use App\Models\Position;

class RankingsController extends Controller
{
    public function index()
    {
        $rankings = Position::with(['candidates' => function ($query) {
            $query->select('candidates.*')
                ->whereNotNull('first_name') // Add null checks
                ->whereNotNull('last_name')
                ->whereHas('partylist')
                ->whereHas('college')
                ->selectRaw('candidates.*, (
                      SELECT COALESCE(COUNT(*), 0)
                      FROM casted_votes
                      WHERE casted_votes.candidate_id = candidates.candidate_id
                      AND casted_votes.position_id = candidates.position_id
                  ) as vote_count')
                ->with(['partylist', 'college'])
                ->orderByDesc('vote_count');
        }])
            ->orderBy('position_order')
            ->get()
            ->mapWithKeys(function ($position) {
                return [$position->name => $position->candidates->filter(function ($candidate) {
                    return $candidate->first_name && $candidate->last_name && $candidate->partylist && $candidate->college;
                })];
            });

        return view('rankings.index', compact('rankings'));
    }
}
