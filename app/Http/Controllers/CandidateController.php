<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Partylist;
use App\Models\Organization;
use App\Models\Position;
use App\Models\College;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    public function index(Request $request)
    {
        $query = Candidate::with(['position', 'college', 'partylist']);

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('middle_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('course', 'like', "%{$search}%")
                  ->orWhereHas('position', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('college', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('partylist', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $candidates = $query->get();
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
        DB::beginTransaction();
        try {
            $data = $request->validated();

            // Check if candidate already exists in any position
            $existingCandidate = Candidate::where('first_name', $data['first_name'])
                ->where('middle_name', $data['middle_name'])
                ->where('last_name', $data['last_name'])
                ->first();

            if ($existingCandidate) {
                DB::rollBack();
                return back()->withInput()->withErrors([
                    'error' => 'This candidate is already running for ' . 
                              $existingCandidate->position->name
                ]);
            }

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $filename = time() . '_' . $photo->getClientOriginalName();
                
                // Store directly in public disk with correct path
                $path = $photo->storeAs('candidates', $filename, 'public');
                $data['photo'] = $filename;

                \Log::info('Photo stored at: ' . $path); // Debug log
            }

            $candidate = Candidate::create($data);
            DB::commit();

            return redirect()->route('candidates.index')
                ->with('success', 'Candidate created successfully');
                
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Candidate creation failed: ' . $e->getMessage());
            return back()->withInput()
                ->withErrors(['error' => 'Failed to create candidate: ' . $e->getMessage()]);
        }
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
        DB::beginTransaction();
        try {
            $data = $request->validated();

            // Check if candidate already exists in any other position
            $existingCandidate = Candidate::where('first_name', $data['first_name'])
                ->where('middle_name', $data['middle_name'])
                ->where('last_name', $data['last_name'])
                ->where('candidate_id', '!=', $candidate->candidate_id)
                ->first();

            if ($existingCandidate) {
                DB::rollBack();
                return back()->withInput()->withErrors([
                    'error' => 'This candidate is already running for ' . 
                              $existingCandidate->position->name
                ]);
            }

            if ($request->hasFile('photo')) {
                // Delete old photo if exists
                if ($candidate->photo) {
                    Storage::delete('public/candidates/' . $candidate->photo);
                }
                
                $photo = $request->file('photo');
                $filename = time() . '_' . $photo->getClientOriginalName();
                $photo->storeAs('public/candidates', $filename);
                $data['photo'] = $filename;
            }

            $candidate->update($data);
            DB::commit();

            return redirect()->route('candidates.index')
                ->with('success', 'Candidate updated successfully');

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Candidate update failed: ' . $e->getMessage());
            return back()->withInput()
                ->withErrors(['error' => 'Failed to update candidate: ' . $e->getMessage()]);
        }
    }

    public function destroy(Candidate $candidate)
    {
        try {
            if ($candidate->photo) {
                Storage::delete('public/candidates/' . $candidate->photo);
            }
            $candidate->delete();
            return redirect()->route('candidates.index')
                ->with('success', 'Candidate deleted successfully');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to delete candidate: ' . $e->getMessage()]);
        }
    }
}
