<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CollegeSeeder::class,
            PositionSeeder::class,
            PartylistSeeder::class,
            MaintenanceSettingsSeeder::class,
            OrganizationSeeder::class,
        ]);

        $this->call(CandidateSeeder::class);

       //Admin Seeder anga ka
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );
    }
}
