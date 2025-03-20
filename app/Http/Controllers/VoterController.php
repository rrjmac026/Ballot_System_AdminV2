<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use App\Models\College;
use App\Helpers\PasskeyGenerator;
use App\Mail\VoterPasskeyMail;
use App\Mail\VoterPasskeyResetMail;
use App\Http\Requests\StoreVoterRequest;
use App\Http\Requests\UpdateVoterRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            // First check for existing voter
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

            $college = College::find($request->college_id);
            $acronym = $this->collegeAcronyms[$college->name] ?? 'BUK';
            $rawPasskey = PasskeyGenerator::generate($acronym);

            $voter = Voter::create([
                'name' => $request->name,
                'student_number' => $request->student_number,
                'college_id' => $request->college_id,
                'course' => $request->course,
                'year_level' => $request->year_level,
                'email' => $request->email,
                'passkey' => $rawPasskey,
                'status' => 'Active'
            ]);

            // Send email in a try-catch block to prevent email failures from affecting voter creation
            try {
                Mail::to($voter->email)->send(new VoterPasskeyMail([
                    'name' => $voter->name,
                    'student_number' => $voter->student_number,
                    'passkey' => $rawPasskey
                ]));
            } catch (\Exception $e) {
                \Log::error('Failed to send voter passkey email: ' . $e->getMessage());
                // Continue execution even if email fails
            }

            return redirect()->route('voters.index')
                ->with('success', 'Voter created successfully.')
                ->with('voterCreated', [
                    'name' => $voter->name,
                    'email' => $voter->email,
                    'passkey' => $rawPasskey
                ]);

        } catch (\Exception $e) {
            \Log::error('Voter creation error: ' . $e->getMessage());
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
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'email' => $request->email,
            'college_id' => $request->college_id,
            'course' => $request->course,
            'status' => $request->status,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $voter->update($data);

        return redirect()->route('voters.index')->with('success', 'Voter updated successfully.');
    }

    public function destroy(Voter $voter)
    {
        $voter->delete();
        return redirect()->route('voters.index')->with('success', 'Voter deleted successfully.');
    }

    public function resetPasskey(Voter $voter)
    {
        $college = College::find($voter->college_id);
        $acronym = $this->collegeAcronyms[$college->name] ?? 'BUK';
        $rawPasskey = PasskeyGenerator::generate($acronym);

        $voter->update(['passkey' => $rawPasskey]); // Will be automatically hashed

        try {
            Mail::to($voter->email)->send(new VoterPasskeyResetMail([
                'name' => $voter->name,
                'passkey' => $rawPasskey
            ]));
        } catch (\Exception $e) {
            \Log::error('Failed to send passkey reset email: ' . $e->getMessage());
        }

        return redirect()->route('voters.index')
            ->with('success', 'Passkey has been reset.')
            ->with('passkeyReset', [
                'name' => $voter->name,
                'email' => $voter->email,
                'passkey' => $rawPasskey
            ]);
    }
}
