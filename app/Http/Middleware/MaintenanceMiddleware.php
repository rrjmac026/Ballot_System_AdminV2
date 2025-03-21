<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\MaintenanceSetting;
use Illuminate\Http\Request;

class MaintenanceMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $maintenanceMode = MaintenanceSetting::where('key', 'maintenance_mode')->first();
        $maintenanceMessage = MaintenanceSetting::where('key', 'maintenance_message')->first();

        if ($maintenanceMode && $maintenanceMode->value === 'true') {
            if ($request->ajax()) {
                return response()->json([
                    'message' => $maintenanceMessage ? $maintenanceMessage->value : 'System under maintenance'
                ], 503);
            }
            
            return response()->view('maintenance', [
                'message' => $maintenanceMessage ? $maintenanceMessage->value : 'System under maintenance'
            ], 503);
        }

        return $next($request);
    }
}
