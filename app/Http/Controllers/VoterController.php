<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use App\Models\College;
use App\Http\Requests\StoreVoterRequest;
use App\Http\Requests\UpdateVoterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VoterController extends Controller
{
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
        Voter::create([
            'student_number' => $request->student_number,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'college_id' => $request->college_id,
            'course' => $request->course,
            'status' => $request->status,
        ]);

        return redirect()->route('voters.index')->with('success', 'Voter added successfully.');
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
}
