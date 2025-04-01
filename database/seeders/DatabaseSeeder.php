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
            CandidateSeeder::class,
        ]);

        // Admin Seeders
        User::updateOrCreate(
            ['email' => '1901102366@student.buksu.edu.ph'],
            [
                'name' => 'Admin Jam Macalutas',
                'password' => Hash::make('gwaposijam123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => '2101103309@student.buksu.edu.ph'],
            [
                'name' => 'Admin Khyle Amacna',
                'password' => Hash::make('gwaposikhyle123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => '1901102046@student.buksu.edu.ph'],
            [
                'name' => 'Admin Kirk John',
                'password' => Hash::make('gwaposikirk123'),
                'role' => 'admin',
            ]
        );
    }
}
