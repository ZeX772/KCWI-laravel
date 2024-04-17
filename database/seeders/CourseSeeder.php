<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('courses')->delete();

        \DB::table('courses')->insert(array (
            0 =>
            array (
                'id' => 1,
                'course_name' => 'Course Name Example',
                'course_abbreviation' => 'CNE',
                'course_full_price' => '100.00',
                'course_sale_price' => '80.00',
                'class_full_price' => '50.00',
                'course_age' => '30',
                'course_remarks' => 'Some remarks about the course',
                'course_color' => 'Blue',
                'course_level' => '1',
                'school_id' => '1',
                'course_status' => 'active',
                'course_term' => 'Fall 2023',
                'course_size' => '20'
            )
        ));
    }
}
