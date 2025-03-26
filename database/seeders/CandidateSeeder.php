<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
{
    public function run()
    {
        $candidates = [
            // ✅ CON-SBO (SINAGTALA PARTYLIST) Candidates
            ['first_name' => 'Trixy', 'middle_name' => 'J.', 'last_name' => 'Morales', 'position_id' => 4, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN'],
            ['first_name' => 'Ann Francis', 'middle_name' => 'B.', 'last_name' => 'Waban', 'position_id' => 5, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN'],
            ['first_name' => 'Tisha Nigella', 'middle_name' => 'D.', 'last_name' => 'Encabo', 'position_id' => 6, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN'],
            ['first_name' => 'Alexa Iris', 'middle_name' => 'V.', 'last_name' => 'Ledres', 'position_id' => 7, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN'],
            ['first_name' => 'Febbie Rose', 'middle_name' => 'M.', 'last_name' => 'Ucat', 'position_id' => 8, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN'],
            ['first_name' => 'Ma. Patricia Celine', 'middle_name' => 'G.', 'last_name' => 'Saavedra', 'position_id' => 9, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN'],
            ['first_name' => 'Angel Grace', 'middle_name' => null, 'last_name' => 'Yulo', 'position_id' => 10, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN'],
            ['first_name' => 'Regine Mae', 'middle_name' => 'M.', 'last_name' => 'Sebandal', 'position_id' => 11, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN'],
            ['first_name' => 'Vince Lucas', 'middle_name' => 'G.', 'last_name' => 'Saavedra', 'position_id' => 14, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN'],
            ['first_name' => 'Queen Zandarra', 'middle_name' => 'L.', 'last_name' => 'Pendatun', 'position_id' => 13, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN'],
            ['first_name' => 'Xylexa Kaye', 'middle_name' => 'C.', 'last_name' => 'Chan', 'position_id' => 12, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN'],

            // ✅ COB-SBO (BANAAG PARTYLIST)
            ['first_name' => 'Aliah', 'middle_name' => 'S.', 'last_name' => 'Namocot', 'position_id' => 4, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSBA-FM A'],
            ['first_name' => 'Lian Carl', 'middle_name' => 'T.', 'last_name' => 'Viloria', 'position_id' => 5, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSBA-FM A'],
            ['first_name' => 'Methusilah', 'middle_name' => 'P.', 'last_name' => 'Vito', 'position_id' => 6, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSHM'],
            ['first_name' => 'Allaiza Mae', 'middle_name' => 'C.', 'last_name' => 'Niedo', 'position_id' => 7, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSA'],
            ['first_name' => 'Jeanneil', 'middle_name' => 'C.', 'last_name' => 'Lira', 'position_id' => 8, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSA'],
            ['first_name' => 'Hannah Dale', 'middle_name' => 'S.', 'last_name' => 'Fernandez', 'position_id' => 9, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSA'],
            ['first_name' => 'Dona Jane', 'middle_name' => 'S.', 'last_name' => 'Belandres', 'position_id' => 10, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSBA-FM A'],
            ['first_name' => 'Joylyn', 'middle_name' => 'M.', 'last_name' => 'Raut', 'position_id' => 11, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSA'],
            ['first_name' => 'Luis Clyde', 'middle_name' => 'M.', 'last_name' => 'Salvo', 'position_id' => 14, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSBA-FM A'],
            ['first_name' => 'Joshua', 'middle_name' => 'T.', 'last_name' => 'Manaran', 'position_id' => 13, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSHM'],
            ['first_name' => 'Joshua Jave', 'middle_name' => 'T.N.', 'last_name' => 'Dinlayan', 'position_id' => 12, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSHM'], 
            
            //COE-SBO (HIRAYA PARTYLIST)
            ['first_name' => 'Ma. Sheinah', 'middle_name' => 'M.', 'last_name' => 'Salvo', 'position_id' => 4, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BSED-SCI'],
            ['first_name' => 'Joseph', 'middle_name' => 'B.', 'last_name' => 'Ginolos', 'position_id' => 5, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BSED-ENG'],
            ['first_name' => 'Rheanna', 'middle_name' => 'G.', 'last_name' => 'Tandog', 'position_id' => 6, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BSED-SCI'],
            ['first_name' => 'Liezel Ann', 'middle_name' => 'P.', 'last_name' => 'Cardaño', 'position_id' => 7, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BSED-SCI'],
            ['first_name' => 'Roan', 'middle_name' => 'C.', 'last_name' => 'Lanzaderas', 'position_id' => 8, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BSED-MATH'],
            ['first_name' => 'Jhimlsy', 'middle_name' => 'C.', 'last_name' => 'Taño', 'position_id' => 9, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BECED'],
            ['first_name' => 'Cannary', 'middle_name' => 'M.', 'last_name' => 'Wenceslao', 'position_id' => 10, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BSED-SOCSTUD'],
            ['first_name' => 'Nashrea', 'middle_name' => 'M.', 'last_name' => 'Dumagpi', 'position_id' => 11, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BSED-SOCSTUD'],
            ['first_name' => 'Jhasper', 'middle_name' => 'S.', 'last_name' => 'Piquero', 'position_id' => 14, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BPED'],
            ['first_name' => 'Corrine May', 'middle_name' => null, 'last_name' => 'Molina', 'position_id' => 13, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BECED'],
            ['first_name' => 'Bjohn Jaimeric', 'middle_name' => 'B.', 'last_name' => 'Mutia', 'position_id' => 12, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BSED-ENG'],

            //CAS-SBO (HIRAYA PARTYLIST) 
            ['first_name' => 'Catherine Nicholle', 'middle_name' => null, 'last_name' => 'Delan', 'position_id' => 4, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'AB-ENG'],
            ['first_name' => 'Yuri', 'middle_name' => null, 'last_name' => 'Magtajas', 'position_id' => 5, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'AB-ENG'],
            ['first_name' => 'Aliah Eve', 'middle_name' => 'B.', 'last_name' => 'Antenero', 'position_id' => 6, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'AB-PHILO'],
            ['first_name' => 'Jhevy', 'middle_name' => null, 'last_name' => 'Repolidon', 'position_id' => 7, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'AB-PHILO'],
            ['first_name' => 'John France', 'middle_name' => 'G.', 'last_name' => 'Pensahan', 'position_id' => 8, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'AB-SOCIO'],
            ['first_name' => 'Camilo Jr.', 'middle_name' => 'A.', 'last_name' => 'Anaya', 'position_id' => 9, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'AB-PHILO'],
            ['first_name' => 'Jhunel Jhay', 'middle_name' => null, 'last_name' => 'Baldeviso', 'position_id' => 10, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'BS-BIO'],
            ['first_name' => 'Ralph Jane', 'middle_name' => null, 'last_name' => 'Comendador', 'position_id' => 11, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'AB-ENG'],
            ['first_name' => 'Jay', 'middle_name' => 'D.', 'last_name' => 'Amonhay', 'position_id' => 13, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'AB-SOCIO'],

            //COT-SBO (HIRAYA PARTYLSIT) 
            ['first_name' => 'Jhon Lester', 'middle_name' => null, 'last_name' => 'Ybañez', 'position_id' => 4, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BSIT'],
            ['first_name' => 'Nicky', 'middle_name' => null, 'last_name' => 'Sarucam', 'position_id' => 5, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BSIT'],
            ['first_name' => 'Kimverly', 'middle_name' => null, 'last_name' => 'Suelo', 'position_id' => 6, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BSIT'],
            ['first_name' => 'Christian Joshua', 'middle_name' => null, 'last_name' => 'Defensor', 'position_id' => 7, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BS-FT'],
            ['first_name' => 'Jeff Ivan', 'middle_name' => null, 'last_name' => 'Mayor', 'position_id' => 8, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BSIT'],
            ['first_name' => 'Jayvee', 'middle_name' => null, 'last_name' => 'Molina', 'position_id' => 9, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BSIT'],
            ['first_name' => 'Sciatzy Marie', 'middle_name' => null, 'last_name' => 'Rabina', 'position_id' => 10, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BSIT'],
            ['first_name' => 'Joseph Ian', 'middle_name' => null, 'last_name' => 'Ochavillo', 'position_id' => 11, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BSIT'],
            ['first_name' => 'Romeo', 'middle_name' => null, 'last_name' => 'Hortilano', 'position_id' => 14, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BSET'],
            ['first_name' => 'Peter Victor', 'middle_name' => null, 'last_name' => 'Dawis', 'position_id' => 13, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BSIT'],
            ['first_name' => 'Carlitos Mari', 'middle_name' => null, 'last_name' => 'Simene', 'position_id' => 12, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BSIT'],

            //CPAG-SBO
            ['first_name' => 'Rejhan', 'middle_name' => null, 'last_name' => 'Dela Cerna', 'position_id' => 4, 'partylist_id' => null, 'college_id' => 4, 'course' => 'BPA'],
            ['first_name' => 'Marviene Angelic', 'middle_name' => null, 'last_name' => 'Caballero', 'position_id' => 5, 'partylist_id' => null, 'college_id' => 4, 'course' => 'BPA'],
            ['first_name' => 'Mechaila Joy', 'middle_name' => null, 'last_name' => 'Marcos', 'position_id' => 6, 'partylist_id' => null, 'college_id' => 4, 'course' => 'BPA'],
            ['first_name' => 'Prencess Michien', 'middle_name' => null, 'last_name' => 'Barace', 'position_id' => 7, 'partylist_id' => null, 'college_id' => 4, 'course' => 'BPA'],
            ['first_name' => 'Christza', 'middle_name' => null, 'last_name' => 'Parista', 'position_id' => 8, 'partylist_id' => null, 'college_id' => 4, 'course' => 'BPA'],
            ['first_name' => 'Chelsey Mae', 'middle_name' => null, 'last_name' => 'Donasco', 'position_id' => 9, 'partylist_id' => null, 'college_id' => 4, 'course' => 'BPA'],
            ['first_name' => 'Carole Ann', 'middle_name' => null, 'last_name' => 'Abobo', 'position_id' => 10, 'partylist_id' => null, 'college_id' => 4, 'course' => 'BPA'],
            ['first_name' => 'Justine Jay', 'middle_name' => null, 'last_name' => 'Boone', 'position_id' => 11, 'partylist_id' => null, 'college_id' => 4, 'course' => 'BPA'],
            ['first_name' => 'Zyrylle Keyth', 'middle_name' => null, 'last_name' => 'Saguinhon', 'position_id' => 13, 'partylist_id' => null, 'college_id' => 4, 'course' => 'BPA'],
            ['first_name' => 'Princess', 'middle_name' => null, 'last_name' => 'Delfin', 'position_id' => 12, 'partylist_id' => null, 'college_id' => 4, 'course' => 'BPA'],

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
