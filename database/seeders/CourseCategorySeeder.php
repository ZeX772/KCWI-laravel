<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('course_types')->delete();
        
        $data = [
            [
                "id" => 1,
                'name' => "ASA",
                'is_public' => 1,
            ],
            [
                "id" => 2,
                'name' => "Club",
                'is_public' => 0,
            ],
            [
                "id" => 3,
                'name' => "Group",
                'is_public' => 0,
            ],
            [
                "id" => 4,
                'name' => "Private",
                'is_public' => 0,
            ],
            [
                "id" => 5,
                'name' => "Run",
                'is_public' => 1,
            ],
            [
                "id" => 6,
                'name' => "Swim Team",
                'is_public' => 1,
            ],
        ];

        \DB::table('course_types')->insert($data);
    }
}
