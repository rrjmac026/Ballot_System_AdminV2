<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Partylist;
use App\Models\Organization;
use App\Models\Position;
use App\Models\College;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::with(['partylist', 'organization', 'position', 'college'])->get();
        return view('candidates.index', compact('candidates'));
    }

    public function create()
    {
        $partylists = Partylist::all();
        $organizations = Organization::all();
        $positions = Position::all();
        $colleges = College::all();
        return view('candidates.create', compact('partylists', 'organizations', 'positions', 'colleges'));
    }

    public function store(StoreCandidateRequest $request)
    {
        Candidate::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'partylist_id' => $request->partylist_id,
            'organization_id' => $request->organization_id,
            'position_id' => $request->position_id,
            'college_id' => $request->college_id,
            'course' => $request->course,
        ]);

        return redirect()->route('candidates.index')->with('success', 'Candidate added successfully.');
    }

    public function show(Candidate $candidate)
    {
        return view('candidates.show', compact('candidate'));
    }

    public function edit(Candidate $candidate)
    {
        $partylists = Partylist::all();
        $organizations = Organization::all();
        $positions = Position::all();
        $colleges = College::all();
        return view('candidates.edit', compact('candidate', 'partylists', 'organizations', 'positions', 'colleges'));
    }

    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        $candidate->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'partylist_id' => $request->partylist_id,
            'organization_id' => $request->organization_id,
            'position_id' => $request->position_id,
            'college_id' => $request->college_id,
            'course' => $request->course,
        ]);

        return redirect()->route('candidates.index')->with('success', 'Candidate updated successfully.');
    }

    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return redirect()->route('candidates.index')->with('success', 'Candidate deleted successfully.');
    }
}
