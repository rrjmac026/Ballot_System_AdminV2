<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\College;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;

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
        $validated = $request->validated();

        // Generate acronym if not provided
        if (empty($validated['acronym'])) {
            $validated['acronym'] = substr(preg_replace('/[^A-Z]/', '', strtoupper($validated['name'])), 0, 10);
        }

        Organization::create($validated);

        return redirect()->route('organizations.index')
            ->with('success', 'Organization created successfully.');
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
        $data = $request->validated();

        // If no college_id is provided, set it to null for university-wide organizations
        if (empty($data['college_id'])) {
            $data['college_id'] = null;
        }

        $organization->update($data);

        return redirect()->route('organizations.index')->with('success', 'Organization updated successfully.');
    }

    public function destroy(Organization $organization)
    {
        $organization->delete();
        return redirect()->route('organizations.index')->with('success', 'Organization deleted successfully.');
    }
}
