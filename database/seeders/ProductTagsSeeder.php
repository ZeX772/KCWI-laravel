<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tags')->delete();

        $productCategories = [
            [
                "id" => 1,
                "name" => "Goggles",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id" => 2,
                "name" => "Flight",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id" => 3,
                "name" => "Skirt",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id" => 4,
                "name" => "Skirt Swimsuit",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id" => 5,
                "name" => "Ear Plugs",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id" => 6,
                "name" => "Swim Vest",
                "created_at" => now(),
                "updated_at" => now(),
            ]
        ];

        \DB::table('tags')->insert($productCategories);
    }
}
