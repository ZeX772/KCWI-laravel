<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddedPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 198,
                'key' => 'browse_invoices',
                'table_name' => 'invoices',
                'created_at' => NULL,
                'updated_at' => NULL,
                'permission_group_id' => NULL,
            ),
            1 => 
            array (
                'id' => 199,
                'key' => 'read_invoices',
                'table_name' => 'invoices',
                'created_at' => NULL,
                'updated_at' => NULL,
                'permission_group_id' => NULL,
            ),
            2 => 
            array (
                'id' => 200,
                'key' => 'edit_invoices',
                'table_name' => 'invoices',
                'created_at' => NULL,
                'updated_at' => NULL,
                'permission_group_id' => NULL,
            ),
            3 => 
            array (
                'id' => 201,
                'key' => 'add_invoices',
                'table_name' => 'invoices',
                'created_at' => NULL,
                'updated_at' => NULL,
                'permission_group_id' => NULL,
            ),
            4 => 
            array (
                'id' => 202,
                'key' => 'delete_invoices',
                'table_name' => 'invoices',
                'created_at' => NULL,
                'updated_at' => NULL,
                'permission_group_id' => NULL,
            ),
        ));

        \DB::table('permission_role')->insert(array (
            0 => 
            array (
                'permission_id' => 198,
                'role_id' => 1,
            ),
            1 => 
            array (
                'permission_id' => 199,
                'role_id' => 1,
            ),
            2 => 
            array (
                'permission_id' => 200,
                'role_id' => 1,
            ),
            3 => 
            array (
                'permission_id' => 201,
                'role_id' => 1,
            ),
            4 => 
            array (
                'permission_id' => 202,
                'role_id' => 1,
            ),
            5 => 
            array (
                'permission_id' => 198,
                'role_id' => 6,
            ),
            6 => 
            array (
                'permission_id' => 199,
                'role_id' => 6,
            ),
            7 => 
            array (
                'permission_id' => 200,
                'role_id' => 6,
            ),
            8 => 
            array (
                'permission_id' => 201,
                'role_id' => 6,
            ),
            9 => 
            array (
                'permission_id' => 202,
                'role_id' => 6,
            ),
        ));
    }
}
