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
            [
                'first_name' => 'Rafael',
                'middle_name' => 'Miguel',
                'last_name' => 'Garcia',
                'position_id' => 8, // Vice-Governor
                'partylist_id' => 1,
                'college_id' => 1,
                'course' => 'BSBA',
                'photo' => null,
                'platform' => 'Supporting the governor in administrative tasks.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Ana',
                'middle_name' => 'Isabel',
                'last_name' => 'Martinez',
                'position_id' => 8, // Vice-Governor
                'partylist_id' => 2,
                'college_id' => 2,
                'course' => 'BSCrim',
                'photo' => null,
                'platform' => 'Assisting in governance and policy implementation.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ✅ Secretary
            [
                'first_name' => 'Luis',
                'middle_name' => 'Felipe',
                'last_name' => 'Reyes',
                'position_id' => 9, // Secretary
                'partylist_id' => 1,
                'college_id' => 3,
                'course' => 'BSN',
                'photo' => null,
                'platform' => 'Maintaining accurate records and minutes.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Sofia',
                'middle_name' => 'Marie',
                'last_name' => 'Dela Cruz',
                'position_id' => 9, // Secretary
                'partylist_id' => 2,
                'college_id' => 1,
                'course' => 'BS Psychology',
                'photo' => null,
                'platform' => 'Ensuring transparency in documentation.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ✅ Associate Secretary
            [
                'first_name' => 'Juan',
                'middle_name' => 'Carlos',
                'last_name' => 'Torres',
                'position_id' => 10, // Associate Secretary
                'partylist_id' => 3,
                'college_id' => 2,
                'course' => 'BSIT',
                'photo' => null,
                'platform' => 'Assisting the secretary in administrative tasks.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Eva',
                'middle_name' => 'Lopez',
                'last_name' => 'Santos',
                'position_id' => 10, // Associate Secretary
                'partylist_id' => 1,
                'college_id' => 3,
                'course' => 'BSHRM',
                'photo' => null,
                'platform' => 'Supporting documentation and record-keeping.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ✅ Treasurer
            [
                'first_name' => 'Pedro',
                'middle_name' => 'Rafael',
                'last_name' => 'Gonzales',
                'position_id' => 11, // Treasurer
                'partylist_id' => 2,
                'college_id' => 1,
                'course' => 'BSBA',
                'photo' => null,
                'platform' => 'Managing financial resources effectively.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Isabella',
                'middle_name' => 'Gomez',
                'last_name' => 'Diaz',
                'position_id' => 11, // Treasurer
                'partylist_id' => 3,
                'college_id' => 2,
                'course' => 'BSCrim',
                'photo' => null,
                'platform' => 'Ensuring financial transparency and accountability.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // ✅ Associate Treasurer
            [
                'first_name' => 'Gabriel',
                'middle_name' => 'Fernandez',
                'last_name' => 'Lopez',
                'position_id' => 12, // Associate Treasurer
                'partylist_id' => 1,
                'college_id' => 3,
                'course' => 'BSN',
                'photo' => null,
                'platform' => 'Assisting in financial management and planning.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Alicia',
                'middle_name' => 'Marie',
                'last_name' => 'Cruz',
                'position_id' => 12, // Associate Treasurer
                'partylist_id' => 2,
                'college_id' => 1,
                'course' => 'BS Psychology',
                'photo' => null,
                'platform' => 'Supporting financial operations and budgeting.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ✅ Auditor
            [
                'first_name' => 'Julian',
                'middle_name' => 'Rafael',
                'last_name' => 'Dela Cruz',
                'position_id' => 13, // Auditor
                'partylist_id' => 3,
                'college_id' => 2,
                'course' => 'BSBA',
                'photo' => null,
                'platform' => 'Ensuring financial integrity and compliance.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Leticia',
                'middle_name' => 'Gomez',
                'last_name' => 'Santos',
                'position_id' => 13, // Auditor
                'partylist_id' => 1,
                'college_id' => 3,
                'course' => 'BSHRM',
                'photo' => null,
                'platform' => 'Conducting audits for transparency and accountability.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ✅ Public Relation Officer
            [
                'first_name' => 'Mateo',
                'middle_name' => 'Fernandez',
                'last_name' => 'Torres',
                'position_id' => 14, // Public Relation Officer
                'partylist_id' => 2,
                'college_id' => 1,
                'course' => 'BSIT',
                'photo' => null,
                'platform' => 'Enhancing public image and communication.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Valentina',
                'middle_name' => 'Lopez',
                'last_name' => 'Diaz',
                'position_id' => 14, // Public Relation Officer
                'partylist_id' => 3,
                'college_id' => 2,
                'course' => 'BSCrim',
                'photo' => null,
                'platform' => 'Building strong relationships with stakeholders.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Mark',
                'middle_name' => 'Anthony',
                'last_name' => 'Gonzales',
                'position_id' => 5, // 2nd Year Representative
                'partylist_id' => 1,
                'college_id' => 1,
                'course' => 'BSIT',
                'photo' => null,
                'platform' => 'I will focus on improving academic resources for second-year students.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Sophia',
                'middle_name' => 'Marie',
                'last_name' => 'Cruz',
                'position_id' => 5, // 2nd Year Representative
                'partylist_id' => 2,
                'college_id' => 2,
                'course' => 'BSCrim',
                'photo' => null,
                'platform' => 'Ensuring fair representation for second-year students.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ✅ 3rd Year Representatives
            [
                'first_name' => 'Daniel',
                'middle_name' => 'James',
                'last_name' => 'Martinez',
                'position_id' => 6, // 3rd Year Representative
                'partylist_id' => 1,
                'college_id' => 3,
                'course' => 'BSN',
                'photo' => null,
                'platform' => 'Advocating for better clinical training facilities.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Emily',
                'middle_name' => 'Rose',
                'last_name' => 'Santos',
                'position_id' => 6, // 3rd Year Representative
                'partylist_id' => 2,
                'college_id' => 1,
                'course' => 'BS Psychology',
                'photo' => null,
                'platform' => 'Supporting student mental health initiatives.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ✅ 4th Year Representatives
            [
                'first_name' => 'Luisa',
                'middle_name' => 'Isabel',
                'last_name' => 'Torres',
                'position_id' => 7, // 4th Year Representative
                'partylist_id' => 3,
                'college_id' => 2,
                'course' => 'BSBA',
                'photo' => null,
                'platform' => 'Enhancing career readiness for graduating students.',
                'photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Marco', // Changed from Julian
                'middle_name' => 'Antonio', // Changed from Rafael
                'last_name' => 'Reyes', // Changed from Dela Cruz
                'position_id' => 7, // 4th Year Representative
                'partylist_id' => 1,
                'college_id' => 3,
                'course' => 'BSHRM',
                'photo' => null,
                'platform' => 'Fostering a supportive community for seniors.',
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
