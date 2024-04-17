<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('product_categories')->delete();

        $productCategories = [
            [
                "id" => 1,
                "name" => "Phone",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id" => 2,
                "name" => "Swimsuit",
                "created_at" => now(),
                "updated_at" => now(),
            ]
        ];

        \DB::table('product_categories')->insert($productCategories);
    }
}
