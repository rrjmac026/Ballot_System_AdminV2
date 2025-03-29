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
                'name' => 'Admin Jam Macalutas',
                'email' => '1901102366@student.buksu.edu.ph',
                'password' => Hash::make('gwaposijam123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Admin Khyle Amacna',
                'email' => '2101103309@student.buksu.edu.ph',
                'password' => Hash::make('gwaposikhyle123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Admin Kirk John',
                'email' => '1901102046@student.buksu.edu.ph',
                'password' => Hash::make('gwaposikirk123'),
                'role' => 'admin',
            ]
        );
    }
}
