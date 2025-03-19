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
                'description' => 'CASALIGAN - Student Political Party'
            ],
            [
                'name' => 'PANGINDAHAY',
                'description' => 'PANGINDAHAY - Student Political Party'
            ],
            [
                'name' => 'SINAGTALA',
                'description' => 'SINAGTALA - Student Political Party'
            ],
            [
                'name' => 'INDEPENDENT',
                'description' => 'INDEPENDENT - Independent Candidates'
            ],
            [
                'name' => 'SILAB',
                'description' => 'SILAB - Student Political Party'
            ],
        ];

        foreach ($partylists as $partylist) {
            Partylist::create($partylist);
        }
    }
}
