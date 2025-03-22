<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
{
    public function run()
    {
        $candidates = [
            // ✅ President Candidates
            [
                'first_name' => 'Juan',
                'middle_name' => 'Dela',
                'last_name' => 'Cruz',
                'position_id' => 1, // President
                'partylist_id' => 1,
                'college_id' => 1,
                'course' => 'BSIT',
                'photo' => null,
                'platform' => 'I will improve student welfare and enhance campus facilities.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jose',
                'middle_name' => 'Andres',
                'last_name' => 'Rizal',
                'position_id' => 1, // President
                'partylist_id' => 2,
                'college_id' => 2,
                'course' => 'BSCrim',
                'photo' => null,
                'platform' => 'My goal is to make academic life easier for students.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ✅ Vice President Candidates
            [
                'first_name' => 'Maria',
                'middle_name' => 'Santos',
                'last_name' => 'Lopez',
                'position_id' => 2, // Vice President
                'partylist_id' => 1,
                'college_id' => 1,
                'course' => 'BSIT',
                'photo' => null,
                'platform' => 'I will advocate for student rights and transparent governance.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Angela',
                'middle_name' => 'Fernandez',
                'last_name' => 'Dela Rosa',
                'position_id' => 2, // Vice President
                'partylist_id' => 2,
                'college_id' => 3,
                'course' => 'BSN',
                'photo' => null,
                'platform' => 'A brighter future for students with fair policies.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ✅ Senator Candidates
            [
                'first_name' => 'Carlos',
                'middle_name' => 'Reyes',
                'last_name' => 'Diaz',
                'position_id' => 3, // Senator
                'partylist_id' => 3,
                'college_id' => 2,
                'course' => 'BS Political Science',
                'photo' => null,
                'platform' => 'I will ensure strong representation for students.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Isabel',
                'middle_name' => 'Gomez',
                'last_name' => 'Santiago',
                'position_id' => 3, // Senator
                'partylist_id' => 1,
                'college_id' => 1,
                'course' => 'BS Psychology',
                'photo' => null,
                'platform' => 'Advocating for student well-being and success.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ✅ Governor Candidates
            [
                'first_name' => 'Luis',
                'middle_name' => 'Garcia',
                'last_name' => 'Torres',
                'position_id' => 4, // Governor
                'partylist_id' => 2,
                'college_id' => 1,
                'course' => 'BSBA',
                'photo' => null,
                'platform' => 'Leadership that inspires and motivates.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Andrea',
                'middle_name' => 'Hernandez',
                'last_name' => 'Delgado',
                'position_id' => 4, // Governor
                'partylist_id' => 3,
                'college_id' => 2,
                'course' => 'BSHRM',
                'photo' => null,
                'platform' => 'Committed to student empowerment and excellence.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert candidates while preventing duplicates
        foreach ($candidates as $candidate) {
            DB::table('candidates')->updateOrInsert(
                [
                    'first_name' => $candidate['first_name'],
                    'middle_name' => $candidate['middle_name'],
                    'last_name' => $candidate['last_name'],
                    'position_id' => $candidate['position_id'],
                ],
                $candidate
            );
        }
    }
}
