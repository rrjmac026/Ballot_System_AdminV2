<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use App\Models\College;
use App\Models\EmailLog;
use App\Http\Requests\StoreVoterRequest;
use App\Http\Requests\UpdateVoterRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VoterController extends Controller
{
    private $collegeAcronyms = [
        'College of Nursing' => 'CON',
        'College of Technologies' => 'COT',
        'College of Arts and Sciences' => 'CAS',
        'College of Public Administration and Governance' => 'CPAG',
        'College of Business' => 'COB',
        'College of Education' => 'COE'
    ];

    public function index()
    {
        $voters = Voter::with('college')->get();
        return view('voters.index', compact('voters'));
    }

    public function create()
    {
        $colleges = College::all();
        return view('voters.create', compact('colleges'));
    }

    public function store(StoreVoterRequest $request)
    {
        try {
            if (Voter::where('student_number', $request->student_number)
                    ->orWhere('email', $request->email)
                    ->exists()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors([
                        'student_number' => 'A voter with this student number already exists.',
                        'email' => 'A voter with this email address already exists.'
                    ]);
            }

            $voter = Voter::create([
                'name' => $request->name,
                'student_number' => $request->student_number,
                'college_id' => $request->college_id,
                'course' => $request->course,
                'year_level' => $request->year_level,
                'email' => $request->email,
                'status' => 'Active'
            ]);

            return redirect()->route('voters.index')
                ->with('success', 'Voter created successfully.');

        } catch (\Exception $e) {
            Log::error('Voter creation error: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to create voter. ' . $e->getMessage()]);
        }
    }

    public function show(Voter $voter)
    {
        return view('voters.show', compact('voter'));
    }

    public function edit(Voter $voter)
    {
        $colleges = College::all();
        return view('voters.edit', compact('voter', 'colleges'));
    }

    public function update(UpdateVoterRequest $request, Voter $voter)
    {
        $data = [
            'student_number' => $request->student_number,
            'name' => $request->name,
            'email' => $request->email,
            'college_id' => $request->college_id,
            'course' => $request->course,
            'status' => $request->status,
        ];

        $voter->update($data);

        return redirect()->route('voters.index')->with('success', 'Voter updated successfully.');
    }

    public function destroy(Voter $voter)
    {
        $voter->delete();
        return redirect()->route('voters.index')->with('success', 'Voter deleted successfully.');
    }
}
