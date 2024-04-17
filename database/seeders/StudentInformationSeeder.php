<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('student_information')->delete();

        \DB::table('student_information')->insert(array(
            0 =>
            array(
                'student_id' => 2,
                'profile_img' => 'users/default.png',
                'first_name' => 'Wave',
                'last_name' => 'Student',
                'chinese_name' => NULL,
                'hkid' => '456',
                'phone' => '123123',
                'dob' => '2023-11-28',
                'gender' => 'male',
                'nationality' => NULL,
                'address' => '123 test test test',
                'school_id' => NULL,
                'grade_of_class' => NULL,
                'hear_about_us' => NULL,
                'referral_by' => NULL,
                'student_level' => NULL,
                'remarks' => NULL,
                'created_at' => '2017-11-21 16:07:22',
                'updated_at' => '2018-09-22 23:34:02',
            )
        ));
    }
}
