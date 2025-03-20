<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Carbon\Carbon;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first() ?? new Setting();
        return view('settings.index', compact('settings'));
    }

    public function update(UpdateSettingRequest $request)
    {
        $settings = Setting::firstOrCreate(['id' => 1]);
        
        $settings->update([
            'election_start' => Carbon::parse($request->election_start),
            'election_end' => Carbon::parse($request->election_end),
            'maintenance_mode' => $request->boolean('maintenance_mode'),
            'registration_enabled' => $request->boolean('registration_enabled'),
            'voting_enabled' => $request->boolean('voting_enabled'),
            'results_enabled' => $request->boolean('results_enabled'),
        ]);

        return redirect()->route('settings.index')
            ->with('success', 'Settings updated successfully');
    }
}
