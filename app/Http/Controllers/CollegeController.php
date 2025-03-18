<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Http\Requests\StoreCollegeRequest;
use App\Http\Requests\UpdateCollegeRequest;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function index()
    {
        $colleges = College::all();
        return view('colleges.index', compact('colleges'));
    }

    public function create()
    {
        return view('colleges.create');
    }

    public function store(StoreCollegeRequest $request)
    {
        College::create([
            'name' => $request->name,
            'acronym' => $request->acronym,
        ]);

        return redirect()->route('colleges.index')->with('success', 'College added successfully.');
    }

    public function show(College $college)
    {
        return view('colleges.show', compact('college'));
    }

    public function edit(College $college)
    {
        return view('colleges.edit', compact('college'));
    }

    public function update(UpdateCollegeRequest $request, College $college)
    {
        $college->update([
            'name' => $request->name,
            'acronym' => $request->acronym,
        ]);

        return redirect()->route('colleges.index')->with('success', 'College updated successfully.');
    }

    public function destroy(College $college)
    {
        $college->delete();
        return redirect()->route('colleges.index')->with('success', 'College deleted successfully.');
    }
}
