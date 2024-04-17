<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClosureReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('closure_reasons')->delete();
        
        $data = [
            [
                'name' => "Pool Cleaning Day",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "General Election Holiday",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "Temp Cleaning",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "Christmas",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "New Year",
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        \DB::table('closure_reasons')->insert($data);
    }
}
