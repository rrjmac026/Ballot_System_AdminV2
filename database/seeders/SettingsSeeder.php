<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'key' => 'election_start',
                'value' => now()->format('Y-m-d H:i:s'),
                'type' => 'datetime',
                'display_name' => 'Election Start Date',
                'description' => 'When the election voting period starts'
            ],
            [
                'key' => 'election_end',
                'value' => now()->addDays(1)->format('Y-m-d H:i:s'),
                'type' => 'datetime',
                'display_name' => 'Election End Date',
                'description' => 'When the election voting period ends'
            ],
            [
                'key' => 'election_status',
                'value' => 'pending',
                'type' => 'select',
                'display_name' => 'Election Status',
                'description' => 'Current status of the election'
            ],
            [
                'key' => 'allow_voter_registration',
                'value' => 'true',
                'type' => 'boolean',
                'display_name' => 'Allow Voter Registration',
                'description' => 'Enable or disable voter registration'
            ],
            [
                'key' => 'maintenance_mode',
                'value' => 'false',
                'type' => 'boolean',
                'display_name' => 'Maintenance Mode',
                'description' => 'Put the system in maintenance mode'
            ],
            [
                'key' => 'maintenance_message',
                'value' => 'The system is currently under maintenance. Please try again later.',
                'type' => 'text',
                'display_name' => 'Maintenance Message',
                'description' => 'Message to display during maintenance'
            ]
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
