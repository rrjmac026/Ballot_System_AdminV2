<?php

namespace App\Http\Controllers;

use App\Models\CastedVote;
use App\Models\Voter;
use App\Models\Candidate;
use App\Models\Position;
use App\Http\Requests\StoreCastedVoteRequest;
use App\Http\Requests\UpdateCastedVoteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CastedVoteController extends Controller
{
    public function index()
    {
        $castedVotes = CastedVote::with(['voter.college'])
            ->select(['transaction_number', 'voter_id', 'voted_at', 'votes'])
            ->distinct('transaction_number')
            ->latest('voted_at')
            ->paginate(15);

        $votingDetails = [];
        foreach ($castedVotes as $vote) {
            $details = [];
            if (is_array($vote->votes)) {
                foreach ($vote->votes as $positionId => $candidateId) {
                    $candidate = Candidate::find($candidateId);
                    $position = Position::find($positionId);
                    if ($candidate && $position) {
                        $details[] = [
                            'position' => $position,
                            'candidate' => $candidate
                        ];
                    }
                }
            }
            $votingDetails[$vote->transaction_number] = $details;
        }

        return view('casted_votes.index', compact('castedVotes', 'votingDetails'));
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
        try {
            DB::beginTransaction();
            
            // Generate single transaction number for all votes
            $transactionNumber = 'TXN-' . date('Ymd') . '-' . strtoupper(Str::random(6));
            
            // Process each position-candidate pair
            foreach ($request->votes as $vote) {
                $voteHash = CastedVote::hashVote($vote['candidate_id']);
                
                CastedVote::create([
                    'transaction_number' => $transactionNumber,
                    'voter_id' => $request->voter_id,
                    'position_id' => $vote['position_id'],
                    'candidate_id' => $vote['candidate_id'],
                    'vote_hash' => $voteHash,
                    'voted_at' => now(),
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent()
                ]);
            }
            
            DB::commit();
            return redirect()->route('casted_votes.index')
                ->with('success', 'All votes recorded successfully.');
                
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withErrors(['error' => 'An error occurred while recording your votes.'])
                ->withInput();
        }
    }

    public function show($transaction_number)
    {
        $transaction = CastedVote::where('transaction_number', $transaction_number)
            ->with(['voter.college'])
            ->firstOrFail();

        $votingDetails = [];
        if (is_array($transaction->votes)) {
            foreach ($transaction->votes as $positionId => $candidateId) {
                $position = Position::find($positionId);
                $candidate = Candidate::with('partylist')->find($candidateId);
                if ($position && $candidate) {
                    $votingDetails[] = [
                        'position' => $position->name,
                        'candidate_name' => $candidate->first_name . ' ' . $candidate->last_name,
                        'partylist' => $candidate->partylist ? $candidate->partylist->name : 'N/A'
                    ];
                }
            }
        }

        return view('casted_votes.show', compact('transaction', 'votingDetails'));
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
