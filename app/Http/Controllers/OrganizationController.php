<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\College;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::with('college')->get();
        return view('organizations.index', compact('organizations'));
    }

    public function create()
    {
        $colleges = College::all();
        return view('organizations.create', compact('colleges'));
    }

    public function store(StoreOrganizationRequest $request)
    {
        Organization::create([
            'name' => $request->name,
            'description' => $request->description,
            'college_id' => $request->college_id,
        ]);

        return redirect()->route('organizations.index')->with('success', 'Organization added successfully.');
    }

    public function show(Organization $organization)
    {
        return view('organizations.show', compact('organization'));
    }

    public function edit(Organization $organization)
    {
        $colleges = College::all();
        return view('organizations.edit', compact('organization', 'colleges'));
    }

    public function update(UpdateOrganizationRequest $request, Organization $organization)
    {
        $organization->update([
            'name' => $request->name,
            'description' => $request->description,
            'college_id' => $request->college_id,
        ]);

        return redirect()->route('organizations.index')->with('success', 'Organization updated successfully.');
    }

    public function destroy(Organization $organization)
    {
        $organization->delete();
        return redirect()->route('organizations.index')->with('success', 'Organization deleted successfully.');
    }
}
