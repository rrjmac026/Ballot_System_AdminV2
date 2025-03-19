<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Organization;
use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::with('organization')->get();
        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        $organizations = Organization::all();
        return view('positions.create', compact('organizations'));
    }

    public function store(StorePositionRequest $request)
    {
        Position::create([
            'name' => $request->name,
            'organization_id' => $request->organization_id,
            'max_winners' => $request->max_winners,
        ]);

        return redirect()->route('positions.index')->with('success', 'Position added successfully.');
    }

    public function show(Position $position)
    {
        return view('positions.show', compact('position'));
    }

    public function edit(Position $position)
    {
        $organizations = Organization::all();
        return view('positions.edit', compact('position', 'organizations'));
    }

    public function update(UpdatePositionRequest $request, Position $position)
    {
        $position->update([
            'name' => $request->name,
            'organization_id' => $request->organization_id,
            'max_winners' => $request->max_winners,
        ]);

        return redirect()->route('positions.index')->with('success', 'Position updated successfully.');
    }

    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('positions.index')->with('success', 'Position deleted successfully.');
    }
}
