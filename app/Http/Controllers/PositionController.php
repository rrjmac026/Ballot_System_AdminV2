<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::all();
        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        return view('positions.create');
    }

    public function store(StorePositionRequest $request)
    {
        Position::create($request->validated());
        return redirect()->route('positions.index');
    }

    public function show(Position $position)
    {
        return view('positions.show', compact('position'));
    }

    public function edit(Position $position)
    {
        return view('positions.edit', compact('position'));
    }

    public function update(UpdatePositionRequest $request, Position $position)
    {
        $position->update($request->validated());
        return redirect()->route('positions.index');
    }

    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('positions.index');
    }
}
