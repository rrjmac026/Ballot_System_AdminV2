<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use App\Models\College;
use App\Models\EmailLog;
use App\Helpers\PasskeyGenerator;
use App\Mail\VoterPasskeyMail;
use App\Mail\VoterPasskeyResetMail;
use App\Http\Requests\StoreVoterRequest;
use App\Http\Requests\UpdateVoterRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

            $college = College::find($request->college_id);
            $acronym = $this->collegeAcronyms[$college->name] ?? 'BUK';
            $rawPasskey = PasskeyGenerator::generate($acronym);
            $hashedPasskey = Hash::make($rawPasskey); // Secure passkey

            // Verify email delivery before creating the voter
            try {
                $mailData = [
                    'voter' => [
                        'name' => $request->name,
                        'student_number' => $request->student_number,
                        'passkey' => $rawPasskey
                    ]
                ];

                Mail::to($request->email)->send(new VoterPasskeyMail($mailData));

                // Only create voter if email was sent successfully
                $voter = Voter::create([
                    'name' => $request->name,
                    'student_number' => $request->student_number,
                    'college_id' => $request->college_id,
                    'course' => $request->course,
                    'year_level' => $request->year_level,
                    'email' => $request->email,
                    'passkey' => $hashedPasskey,
                    'status' => 'Active'
                ]);

                EmailLog::create([
                    'recipient_email' => $voter->email,
                    'recipient_name' => $voter->name,
                    'subject' => 'Voter Registration',
                    'type' => 'voter_creation',
                    'status' => 'sent'
                ]);

                return redirect()->route('voters.index')
                    ->with('success', 'Voter created successfully.')
                    ->with('voterCreated', [
                        'name' => $voter->name,
                        'email' => $voter->email
                    ]);

            } catch (\Exception $e) {
                Log::error('Email sending failed: ' . $e->getMessage());
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['error' => 'Failed to send email. Voter was not created.']);
            }

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
        try {
            $college = College::find($voter->college_id);
            $acronym = $this->collegeAcronyms[$college->name] ?? 'BUK';
            $newPasskey = PasskeyGenerator::generate($acronym);
            $hashedPasskey = Hash::make($newPasskey);

            // Temporarily update passkey
            $oldPasskey = $voter->passkey;
            $voter->update(['passkey' => $hashedPasskey]);

            try {
                Mail::to($voter->email)->send(new VoterPasskeyResetMail([
                    'voter' => [
                        'name' => $voter->name,
                        'student_number' => $voter->student_number,
                        'passkey' => $newPasskey
                    ]
                ]));

                EmailLog::create([
                    'recipient_email' => $voter->email,
                    'recipient_name' => $voter->name,
                    'subject' => 'Passkey Reset',
                    'type' => 'passkey_reset',
                    'status' => 'sent'
                ]);

                return redirect()->route('voters.index')
                    ->with('success', 'Passkey has been reset successfully.');

            } catch (\Exception $e) {
                // Revert old passkey if email sending fails
                $voter->update(['passkey' => $oldPasskey]);

                Log::error('Passkey reset email failed: ' . $e->getMessage());
                return redirect()->back()
                    ->withErrors(['error' => 'Failed to send reset email.']);
            }

        } catch (\Exception $e) {
            EmailLog::create([
                'recipient_email' => $voter->email,
                'recipient_name' => $voter->name,
                'subject' => 'Passkey Reset',
                'type' => 'passkey_reset',
                'status' => 'failed',
                'error_message' => $e->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Unable to reset passkey.']);
        }
    }
}
