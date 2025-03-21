<?php

namespace Database\Seeders;

use App\Models\MaintenanceSetting;
use Illuminate\Database\Seeder;

class MaintenanceSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'key' => 'maintenance_mode',
                'value' => 'false',
                'description' => 'Controls whether the system is in maintenance mode'
            ],
            [
                'key' => 'maintenance_message',
                'value' => 'The system is currently under maintenance. Please check back later.',
                'description' => 'Message shown during maintenance mode'
            ]
        ];

        foreach ($settings as $setting) {
            MaintenanceSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
