<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $positions = [
            ['name' => 'President'],
            ['name' => 'Vice President'],
            ['name' => 'Senator'],
            ['name' => 'Governor'],
            ['name' => 'Vice Governor'],
            ['name' => 'Secretary'],
            ['name' => 'Associate Secretary'],
            ['name' => 'Treasurer'],
            ['name' => 'Associate Treasurer'],
            ['name' => 'Auditor'],
            ['name' => 'Public Relation Officer'],
            ['name' => 'Second Year Representative'],
            ['name' => 'Third Year Representative'],
            ['name' => 'Fourth Year Representative'],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
