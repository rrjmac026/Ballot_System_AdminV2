<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    public function run()
    {
        // Sample organizations
        $organizations = [
            [
                'name' => 'Supreme Student Council',
                'acronym' => 'SSC',
                'description' => 'The official student government of BukSU.',
                'college_id' => 1, // Ensure this matches an existing college_id
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Student Body Organization',
                'acronym' => 'SBO',
                'description' => 'The official student government of BukSU.',
                'college_id' => 1, // Ensure this matches an existing college_id
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ];

        // Insert data into the organizations table
        DB::table('organizations')->insert($organizations);
    }
}
