<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceSetting;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function toggle()
    {
        $maintenanceMode = MaintenanceSetting::where('key', 'maintenance_mode')->first();
        $currentStatus = $maintenanceMode->value === 'true';
        
        $maintenanceMode->update([
            'value' => $currentStatus ? 'false' : 'true'
        ]);

        $status = $currentStatus ? 'disabled' : 'enabled';
        return back()->with('success', "Maintenance mode has been {$status}.");
    }

    public function updateMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255'
        ]);

        MaintenanceSetting::where('key', 'maintenance_message')->update([
            'value' => $request->message
        ]);

        return back()->with('success', 'Maintenance message has been updated.');
    }
}
