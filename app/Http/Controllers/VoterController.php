<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreVoterRequest;
use App\Http\Requests\UpdateVoterRequest;
use App\Models\College;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VoterController extends Controller
{
    private $collegeAcronyms = [
        'College of Nursing'                              => 'CON',
        'College of Technologies'                         => 'COT',
        'College of Arts and Sciences'                    => 'CAS',
        'College of Public Administration and Governance' => 'CPAG',
        'College of Business'                             => 'COB',
        'College of Education'                            => 'COE',
    ];

    public function index(Request $request)
    {
        $search = $request->get('search');

        $voters = Voter::with('college')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('student_number', 'like', '%' . $search . '%')
                        ->orWhere('course', 'like', '%' . $search . '%')
                        ->orWhereHas('college', function ($q) use ($search) {
                            $q->where('name', 'like', '%' . $search . '%');
                        });
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString(); // Add this to maintain search parameter in pagination links

        if ($request->ajax()) {
            return view('voters.partials._table', compact('voters'));
        }

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
                        'email'          => 'A voter with this email address already exists.',
                    ]);
            }

            $voter = Voter::create([
                'name'           => $request->name,
                'student_number' => $request->student_number,
                'college_id'     => $request->college_id,
                'course'         => $request->course,
                'year_level'     => $request->year_level,
                'email'          => $request->email,
                'status'         => 'Active',
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
        try {
            $validated = $request->validated();
            $voter->update($validated);

            return redirect()
                ->route('voters.index')
                ->with('success', 'Voter updated successfully');
        } catch (\Exception $e) {
            Log::error('Voter update error: ' . $e->getMessage());
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to update voter. Please try again.']);
        }
    }

    public function destroy(Voter $voter)
    {
        $voter->delete();
        return redirect()->route('voters.index')->with('success', 'Voter deleted successfully.');
    }
}
