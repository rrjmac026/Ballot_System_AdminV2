<?php

namespace Database\Seeders;

use App\Models\Partylist;
use Illuminate\Database\Seeder;

class PartylistSeeder extends Seeder
{
    public function run(): void
    {
        $partylists = [
            [
                'name' => 'CASALIGAN',
                'acronym' => 'CSL',
                'description' => 'CASALIGAN - Student Political Party'
            ],
            [
                'name' => 'PANGINDAHAY',
                'acronym' => 'PNG',
                'description' => 'PANGINDAHAY - Student Political Party'
            ],
            [
                'name' => 'SINAGTALA',
                'acronym' => 'SNG',
                'description' => 'SINAGTALA - Student Political Party'
            ],
            [
                'name' => 'INDEPENDENT',
                'acronym' => 'IND',
                'description' => 'INDEPENDENT - Independent Candidates'
            ],
            [
                'name' => 'SILAB',
                'acronym' => 'SLB',
                'description' => 'SILAB - Student Political Party'
            ],
        ];

        foreach ($partylists as $partylist) {
            Partylist::create($partylist);
        }
    }
}
