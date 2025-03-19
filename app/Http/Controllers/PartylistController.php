<?php

namespace App\Http\Controllers;

use App\Models\Partylist;
use App\Http\Requests\StorePartylistRequest;
use App\Http\Requests\UpdatePartylistRequest;
use Illuminate\Http\Request;

class PartylistController extends Controller
{
    public function index()
    {
        $partylists = Partylist::all();
        return view('partylists.index', compact('partylists'));
    }

    public function create()
    {
        return view('partylists.create');
    }

    public function store(StorePartylistRequest $request)
    {
        Partylist::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('partylists.index')->with('success', 'Partylist added successfully.');
    }

    public function show(Partylist $partylist)
    {
        return view('partylists.show', compact('partylist'));
    }

    public function edit(Partylist $partylist)
    {
        return view('partylists.edit', compact('partylist'));
    }

    public function update(UpdatePartylistRequest $request, Partylist $partylist)
    {
        $partylist->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('partylists.index')->with('success', 'Partylist updated successfully.');
    }

    public function destroy(Partylist $partylist)
    {
        $partylist->delete();
        return redirect()->route('partylists.index')->with('success', 'Partylist deleted successfully.');
    }
}
