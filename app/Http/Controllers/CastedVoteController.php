<?php

namespace App\Http\Controllers;

use App\Models\CastedVote;
use App\Models\Voter;
use App\Models\Candidate;
use App\Models\Position;
use App\Http\Requests\StoreCastedVoteRequest;
use App\Http\Requests\UpdateCastedVoteRequest;
use Illuminate\Http\Request;

class CastedVoteController extends Controller
{
    public function index()
    {
        $castedVotes = CastedVote::with(['voter', 'candidate', 'position'])->get();
        return view('casted_votes.index', compact('castedVotes'));
    }

    public function create()
    {
        $voters = Voter::all();
        $candidates = Candidate::all();
        $positions = Position::all();
        return view('casted_votes.create', compact('voters', 'candidates', 'positions'));
    }

    public function store(StoreCastedVoteRequest $request)
    {
        CastedVote::create([
            'voter_id' => $request->voter_id,
            'candidate_id' => $request->candidate_id,
            'position_id' => $request->position_id,
            'election_type' => $request->election_type,
        ]);

        return redirect()->route('casted_votes.index')->with('success', 'Vote casted successfully.');
    }

    public function show(CastedVote $castedVote)
    {
        return view('casted_votes.show', compact('castedVote'));
    }

    public function edit(CastedVote $castedVote)
    {
        $voters = Voter::all();
        $candidates = Candidate::all();
        $positions = Position::all();
        return view('casted_votes.edit', compact('castedVote', 'voters', 'candidates', 'positions'));
    }

    public function update(UpdateCastedVoteRequest $request, CastedVote $castedVote)
    {
        $castedVote->update([
            'voter_id' => $request->voter_id,
            'candidate_id' => $request->candidate_id,
            'position_id' => $request->position_id,
            'election_type' => $request->election_type,
        ]);

        return redirect()->route('casted_votes.index')->with('success', 'Vote updated successfully.');
    }

    public function destroy(CastedVote $castedVote)
    {
        $castedVote->delete();
        return redirect()->route('casted_votes.index')->with('success', 'Vote deleted successfully.');
    }
}
