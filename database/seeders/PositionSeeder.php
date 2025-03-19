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
            ['name' => 'Secretary'],
            ['name' => 'Treasurer'],
            ['name' => 'Auditor'],
            ['name' => 'Public Information Officer'],
            ['name' => 'Peace Officer'],
            ['name' => 'Business Manager'],
            ['name' => 'First Year Representative'],
            ['name' => 'Second Year Representative'],
            ['name' => 'Third Year Representative'],
            ['name' => 'Fourth Year Representative'],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
