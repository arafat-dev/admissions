<?php

namespace Database\Seeders;

use App\Models\Scholarship;
use Illuminate\Database\Seeder;

class ScholarshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data= [
            [
                'program_type_id' => 1,
                'from' => 45,
                'to' => 59,
                'percentage' => 10
            ],
            [
                'program_type_id' => 1,
                'from' => 60,
                'to' => 74,
                'percentage' => 20
            ],
            [
                'program_type_id' => 1,
                'from' => 75,
                'to' => 79,
                'percentage' => 25
            ],
            [
                'program_type_id' => 1,
                'from' => 80,
                'to' => 84,
                'percentage' => 40
            ],
            [
                'program_type_id' => 1,
                'from' => 85,
                'to' => 89,
                'percentage' => 50
            ],
            [
                'program_type_id' => 1,
                'from' => 90,
                'to' => 94,
                'percentage' => 60
            ],
            [
                'program_type_id' => 1,
                'from' => 95,
                'to' => 100,
                'percentage' => 80
            ],

            // for program 2
            [
                'program_type_id' => 2,
                'from' => 45,
                'to' => 59,
                'percentage' => 10
            ],
            [
                'program_type_id' => 2,
                'from' => 60,
                'to' => 74,
                'percentage' => 20
            ],
            [
                'program_type_id' => 2,
                'from' => 75,
                'to' => 79,
                'percentage' => 25
            ],
            [
                'program_type_id' => 2,
                'from' => 80,
                'to' => 84,
                'percentage' => 40
            ],
            [
                'program_type_id' => 2,
                'from' => 85,
                'to' => 89,
                'percentage' => 50
            ],
            [
                'program_type_id' => 2,
                'from' => 90,
                'to' => 94,
                'percentage' => 60
            ],
            [
                'program_type_id' => 2,
                'from' => 95,
                'to' => 100,
                'percentage' => 80
            ],

            // for program 3
            [
                'program_type_id' => 3,
                'from' => 45,
                'to' => 59,
                'percentage' => 10
            ],
            [
                'program_type_id' => 3,
                'from' => 60,
                'to' => 74,
                'percentage' => 20
            ],
            [
                'program_type_id' => 3,
                'from' => 75,
                'to' => 79,
                'percentage' => 25
            ],
            [
                'program_type_id' => 3,
                'from' => 80,
                'to' => 84,
                'percentage' => 40
            ],
            [
                'program_type_id' => 3,
                'from' => 85,
                'to' => 89,
                'percentage' => 50
            ],
            [
                'program_type_id' => 3,
                'from' => 90,
                'to' => 94,
                'percentage' => 60
            ],
            [
                'program_type_id' => 3,
                'from' => 95,
                'to' => 100,
                'percentage' => 80
            ],
        ];

        Scholarship::insert($data);
    }
}
