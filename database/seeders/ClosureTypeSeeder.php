<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClosureTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('closure_types')->delete();
        
        $data = [
            [
                'name' => "Maintenance",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "Cleaning",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "Other",
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        \DB::table('closure_types')->insert($data);
    }
}
