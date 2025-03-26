<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
{
    public function run()
    {
        $candidates = [

             // SINAGTALA PARTYLIST Candidates
             ['first_name' => 'Carlo Jacky', 'middle_name' => 'S.', 'last_name' => 'Ellevera', 'position_id' => 1, 'partylist_id' => 1, 'college_id' => 3, 'course' => 'AB-PHILO', 'photo' => '1743010382_Layer 1.jpg'],
             ['first_name' => 'Raymond Joseph', 'middle_name' => 'D.', 'last_name' => 'Normor', 'position_id' => 2, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN', 'photo' => '1743010394_Layer 2.png'],
             ['first_name' => 'Junn Llenard', 'middle_name' => null, 'last_name' => 'Pancho', 'position_id' => 3, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN', 'photo' => '1743010453_Layer 8.png'],
             ['first_name' => 'Bea', 'middle_name' => 'E.', 'last_name' => 'Pahuyo', 'position_id' => 3, 'partylist_id' => 1, 'college_id' => 5, 'course' => 'BSA', 'photo' => '1743010330_Layer 4.png'],
             ['first_name' => 'Rica', 'middle_name' => 'B.', 'last_name' => 'Tubil', 'position_id' => 3, 'partylist_id' => 1, 'college_id' => 5, 'course' => 'BSA', 'photo' => '1743010437_Layer 6.png'],
             ['first_name' => 'Julliana Nash Allyson', 'middle_name' => 'L.', 'last_name' => 'Pacursa', 'position_id' => 3, 'partylist_id' => 1, 'college_id' => 3, 'course' => 'AB-PHILO', 'photo' => '1743010483_Layer 10.png'],
             ['first_name' => 'Jan Kenneth', 'middle_name' => 'M.', 'last_name' => 'Vargas', 'position_id' => 3, 'partylist_id' => 1, 'college_id' => 4, 'course' => 'BPA', 'photo' => '1743010467_Layer 9.png'],
             ['first_name' => 'Jhunine', 'middle_name' => 'P.', 'last_name' => 'Pontillas', 'position_id' => 3, 'partylist_id' => 1, 'college_id' => 4, 'course' => 'BPA', 'photo' => '1743010368_Layer 7.png'],
             ['first_name' => 'Michael Angelo', 'middle_name' => 'Q.', 'last_name' => 'Cancamo', 'position_id' => 3, 'partylist_id' => 1, 'college_id' => 2, 'course' => 'BSIT', 'photo' => '1743010347_Layer 5.png'],
             ['first_name' => 'Amerah', 'middle_name' => 'M.', 'last_name' => 'Abdusamad', 'position_id' => 3, 'partylist_id' => 1, 'college_id' => 3, 'course' => 'BS-BIO', 'photo' => '1743010418_Layer 3.png'],
              
             // HIRAYA PARTYLIST Candidates
            ['first_name' => 'Roxanne Mae', 'middle_name' => 'J.', 'last_name' => 'Ortega', 'position_id' => 1, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'AB-ENG', 'photo' => '1743011946_SSC_ORTEGA.jpg'],
            ['first_name' => 'Edric Lance', 'middle_name' => 'O.', 'last_name' => 'Gabrinez', 'position_id' => 2, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BPED', 'photo' => '1743011965_SSC_GABRINEZ.jpg'],
            ['first_name' => 'Keevo Arn', 'middle_name' => 'J.', 'last_name' => 'Delfin', 'position_id' => 3, 'partylist_id' => 3, 'college_id' => 5, 'course' => 'BSBA-FM A', 'photo' => '1743011936_SSC_DELFIN.jpg'],
            ['first_name' => 'Van Fergus', 'middle_name' => 'Y.', 'last_name' => 'Dumalahay', 'position_id' => 3, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'AB-ENG', 'photo' => '1743009584_SSC_DUMALAYHAY.jpg'],
            ['first_name' => 'Chona Mae', 'middle_name' => 'E.', 'last_name' => 'Nalda', 'position_id' => 3, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'BS-ES', 'photo' => '1743011976_SSC_NALDA.jpg'],
            ['first_name' => 'Neil Jasper', 'middle_name' => 'L.', 'last_name' => 'Dinlayan', 'position_id' => 3, 'partylist_id' => 3, 'college_id' => 4, 'course' => 'BPA', 'photo' => '1743009513_SSC_DINLAYAN.jpg'],
 
            // ✅ CON-SBO (SINAGTALA PARTYLIST) Candidates
            ['first_name' => 'Trixy', 'middle_name' => 'J.', 'last_name' => 'Morales', 'position_id' => 4, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN', 'photo' => '1743010902_Layer 1.jpg'],
            ['first_name' => 'Ann Francis', 'middle_name' => 'B.', 'last_name' => 'Waban', 'position_id' => 5, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN', 'photo' => '1743011497_Layer 2.jpg'],
            ['first_name' => 'Tisha Nigella', 'middle_name' => 'D.', 'last_name' => 'Encabo', 'position_id' => 6, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN', 'photo' => '1743011507_Layer 4.jpg'],
            ['first_name' => 'Alexa Iris', 'middle_name' => 'V.', 'last_name' => 'Ledres', 'position_id' => 7, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN', 'photo' => '1743011290_Layer 11.jpg'],
            ['first_name' => 'Febbie Rose', 'middle_name' => 'M.', 'last_name' => 'Ucat', 'position_id' => 8, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN', 'photo' => '1743011547_Layer 6.jpg'],
            ['first_name' => 'Ma. Patricia Celine', 'middle_name' => 'G.', 'last_name' => 'Saavedra', 'position_id' => 9, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN', 'photo' => '1743011188_Layer 3.jpg'],
            ['first_name' => 'Angel Grace', 'middle_name' => null, 'last_name' => 'Yulo', 'position_id' => 10, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN', 'photo' => '1743011257_Layer 10.jpg'],
            ['first_name' => 'Regine Mae', 'middle_name' => 'M.', 'last_name' => 'Sebandal', 'position_id' => 11, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN', 'photo' => '1743011531_Layer 5.jpg'],
            ['first_name' => 'Vince Lucas', 'middle_name' => 'G.', 'last_name' => 'Saavedra', 'position_id' => 14, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN', 'photo' => '1743011571_Layer 7.jpg'],
            ['first_name' => 'Queen Zandarra', 'middle_name' => 'L.', 'last_name' => 'Pendatun', 'position_id' => 13, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN', 'photo' => '1743011214_Layer 8.jpg'],
            ['first_name' => 'Xylexa Kaye', 'middle_name' => 'C.', 'last_name' => 'Chan', 'position_id' => 12, 'partylist_id' => 1, 'college_id' => 1, 'course' => 'BSN', 'photo' => '1743011586_Layer 9.jpg'],

            // ✅ COB-SBO (BANAAG PARTYLIST)
            ['first_name' => 'Aliah', 'middle_name' => 'S.', 'last_name' => 'Namocot', 'position_id' => 4, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSBA-FM A', 'photo' => '1743010702_Layer 1.jpg'],
            ['first_name' => 'Lian Carl', 'middle_name' => 'T.', 'last_name' => 'Viloria', 'position_id' => 5, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSBA-FM A', 'photo' => '1743010642_Layer 2.png'],
            ['first_name' => 'Methusilah', 'middle_name' => 'P.', 'last_name' => 'Vito', 'position_id' => 6, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSHM', 'photo' => '1743010723_Layer 3.png'],
            ['first_name' => 'Allaiza Mae', 'middle_name' => 'C.', 'last_name' => 'Niedo', 'position_id' => 7, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSA', 'photo' => '1743010742_Layer 4.png'],
            ['first_name' => 'Jeanneil', 'middle_name' => 'C.', 'last_name' => 'Lira', 'position_id' => 8, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSA', 'photo' => '1743010771_Layer 5.png'],
            ['first_name' => 'Hannah Dale', 'middle_name' => 'S.', 'last_name' => 'Fernandez', 'position_id' => 9, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSA', 'photo' => '1743010787_Layer 6.png'],
            ['first_name' => 'Dona Jane', 'middle_name' => 'S.', 'last_name' => 'Belandres', 'position_id' => 10, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSBA-FM A', 'photo' => '1743010805_Layer 7.png'],
            ['first_name' => 'Joylyn', 'middle_name' => 'M.', 'last_name' => 'Raut', 'position_id' => 11, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSA', 'photo' => '1743010663_Layer 8.png'],
            ['first_name' => 'Luis Clyde', 'middle_name' => 'M.', 'last_name' => 'Salvo', 'position_id' => 14, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSBA-FM A', 'photo' => '1743010824_Layer 9.png'],
            ['first_name' => 'Joshua', 'middle_name' => 'T.', 'last_name' => 'Manaran', 'position_id' => 13, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSHM', 'photo' => '1743010840_Layer 10.png'],
            ['first_name' => 'Joshua Jave', 'middle_name' => 'T.N.', 'last_name' => 'Dinlayan', 'position_id' => 12, 'partylist_id' => 2, 'college_id' => 5, 'course' => 'BSHM', 'photo' => '1743010532_Layer 11.png'],
            
            //COE-SBO (HIRAYA PARTYLIST)
            ['first_name' => 'Ma. Sheinah', 'middle_name' => 'M.', 'last_name' => 'Salvo', 'position_id' => 4, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BSED-SCI', 'photo' => '1743008970_COE_GOV.jpg'],
            ['first_name' => 'Joseph', 'middle_name' => 'B.', 'last_name' => 'Ginolos', 'position_id' => 5, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BSED-ENG', 'photo' => '1743009453_COE_VICE.jpg'],
            ['first_name' => 'Rheanna', 'middle_name' => 'G.', 'last_name' => 'Tandog', 'position_id' => 6, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BSED-SCI', 'photo' => '1743009021_COE_SEC.jpg'],
            ['first_name' => 'Liezel Ann', 'middle_name' => 'P.', 'last_name' => 'Cardaño', 'position_id' => 7, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BSED-SCI', 'photo' => '1743008870_COE_ASOC_SEC.jpg'],
            ['first_name' => 'Roan', 'middle_name' => 'C.', 'last_name' => 'Lanzaderas', 'position_id' => 8, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BSED-MATH', 'photo' => '1743009419_COE_TRES.jpg'],
            ['first_name' => 'Jhimlsy', 'middle_name' => 'C.', 'last_name' => 'Taño', 'position_id' => 9, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BECED', 'photo' => '1743008907_COE_ASOC_TRES.jpg'],
            ['first_name' => 'Cannary', 'middle_name' => 'M.', 'last_name' => 'Wenceslao', 'position_id' => 10, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BSED-SOCSTUD', 'photo' => '1743008952_COE_AUDI.jpg'],
            ['first_name' => 'Nashrea', 'middle_name' => 'M.', 'last_name' => 'Dumagpi', 'position_id' => 11, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BSED-SOCSTUD', 'photo' => '1743008998_COE_PRO.jpg'],
            ['first_name' => 'Jhasper', 'middle_name' => 'S.', 'last_name' => 'Piquero', 'position_id' => 14, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BPED', 'photo' => '1743012191_COE_4TH.jpg'],
            ['first_name' => 'Corrine May', 'middle_name' => null, 'last_name' => 'Molina', 'position_id' => 13, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BECED', 'photo' => '1743008798_COE_3RD.jpg'],
            ['first_name' => 'Bjohn Jaimeric', 'middle_name' => 'B.', 'last_name' => 'Mutia', 'position_id' => 12, 'partylist_id' => 3, 'college_id' => 6, 'course' => 'BSED-ENG', 'photo' => '1743008775_COE_2ND.jpg'],

            //CAS-SBO (HIRAYA PARTYLIST) 
            ['first_name' => 'Catherine Nicholle', 'middle_name' => null, 'last_name' => 'Delan', 'position_id' => 4, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'AB-ENG', 'photo' => '1743008647_CAS_GOV.jpg'],
            ['first_name' => 'Yuri', 'middle_name' => null, 'last_name' => 'Magtajas', 'position_id' => 5, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'AB-ENG', 'photo' => '1743008746_CAS_VICE.jpg'],
            ['first_name' => 'Aliah Eve', 'middle_name' => 'B.', 'last_name' => 'Antenero', 'position_id' => 6, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'AB-PHILO', 'photo' => '1743008701_CAS_SEC.jpg'],
            ['first_name' => 'Jhevy', 'middle_name' => null, 'last_name' => 'Repolidon', 'position_id' => 7, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'AB-PHILO', 'photo' => '1743008578_CAS_ASOC_SEC.jpg'],
            ['first_name' => 'John France', 'middle_name' => 'G.', 'last_name' => 'Pensahan', 'position_id' => 8, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'AB-SOCIO', 'photo' => '1743008722_CAS_TRES.jpg'],
            ['first_name' => 'Camilo Jr.', 'middle_name' => 'A.', 'last_name' => 'Anaya', 'position_id' => 9, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'AB-PHILO', 'photo' => '1743008601_CAS_ASOC_TRES.jpg'],
            ['first_name' => 'Jhunel Jhay', 'middle_name' => null, 'last_name' => 'Baldeviso', 'position_id' => 10, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'BS-BIO', 'photo' => '1743008623_CAS_AUDI.jpg'],
            ['first_name' => 'Ralph Jane', 'middle_name' => null, 'last_name' => 'Comendador', 'position_id' => 11, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'AB-ENG', 'photo' => '1743008678_CAS_PRO.jpg'],
            ['first_name' => 'Jay', 'middle_name' => 'D.', 'last_name' => 'Amonhay', 'position_id' => 13, 'partylist_id' => 3, 'college_id' => 3, 'course' => 'AB-SOCIO', 'photo' => '1743008511_CAS_3RD.jpg'],

            //COT-SBO (HIRAYA PARTYLSIT) 
            ['first_name' => 'Jhon Lester', 'middle_name' => null, 'last_name' => 'Ybañez', 'position_id' => 4, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BSIT', 'photo' => '1743011426_COT_GOV.jpg'],
            ['first_name' => 'Nicky', 'middle_name' => null, 'last_name' => 'Sarucam', 'position_id' => 5, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BSIT', 'photo' => '1743011127_COT_VICE.jpg'],
            ['first_name' => 'Kimverly', 'middle_name' => null, 'last_name' => 'Suelo', 'position_id' => 6, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BSIT', 'photo' => '1743011456_COT_SEC.jpg'],
            ['first_name' => 'Christian Joshua', 'middle_name' => null, 'last_name' => 'Defensor', 'position_id' => 7, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BS-FT', 'photo' => '1743011366_COT_ASOC_SEC.jpg'],
            ['first_name' => 'Jeff Ivan', 'middle_name' => null, 'last_name' => 'Mayor', 'position_id' => 8, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BSIT', 'photo' => '1743011475_COT_TRES.jpg'],
            ['first_name' => 'Jayvee', 'middle_name' => null, 'last_name' => 'Molina', 'position_id' => 9, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BSIT', 'photo' => '1743011384_COT_ASOC_TRES.jpg'],
            ['first_name' => 'Sciatzy Marie', 'middle_name' => null, 'last_name' => 'Rabina', 'position_id' => 10, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BSIT', 'photo' => '1743011401_COT_AUDI.jpg'],
            ['first_name' => 'Joseph Ian', 'middle_name' => null, 'last_name' => 'Ochavillo', 'position_id' => 11, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BSIT', 'photo' => '1743011442_COT_PRO.jpg'],
            ['first_name' => 'Romeo', 'middle_name' => null, 'last_name' => 'Hortilano', 'position_id' => 14, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BSET', 'photo' => '1743011335_COT_4TH.jpg'],
            ['first_name' => 'Peter Victor', 'middle_name' => null, 'last_name' => 'Dawis', 'position_id' => 13, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BSIT', 'photo' => '1743011104_COT_3RD.jpg'],
            ['first_name' => 'Carlitos Mari', 'middle_name' => null, 'last_name' => 'Simene', 'position_id' => 12, 'partylist_id' => 3, 'college_id' => 2, 'course' => 'BSIT', 'photo' => '1743011308_COT_2ND.jpg'],

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
