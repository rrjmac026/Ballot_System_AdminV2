<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\College;

class CollegeSeeder extends Seeder
{
    public function run(): void
    {
        $colleges = [
            [
                'name' => 'College of Nursing',
                'acronym' => 'CON'
            ],
            [
                'name' => 'College of Technologies',
                'acronym' => 'COT'
            ],
            [
                'name' => 'College of Arts and Sciences',
                'acronym' => 'CAS'
            ],
            [
                'name' => 'College of Public Administration and Governance',
                'acronym' => 'CPAG'
            ],
            [
                'name' => 'College of Business',
                'acronym' => 'COB'
            ],
            [
                'name' => 'College of Education',
                'acronym' => 'COE'
            ],
        ];

        foreach ($colleges as $college) {
            College::create($college);
        }
    }
}
