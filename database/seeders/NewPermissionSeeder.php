<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \DB::table('permissions')->delete();

        $modules = ['dashboard','time_table', 'student', 'course', 'level', 'venue', 'classes', 'qr_scanner', 'competition', 'coach', 
            'products', 'orders', 'customers', // eCommerce
            'request', 'accounting', 'payroll', 'report',
            'web_app', 'place_video', 'share_video', // Content
            'notification_category', 'notification_announcement', // Notification
            'role', 'staff', 'school', 'closure', 'bank_list', 'faq', // Setting
            'news', 'user', 
            'receipt', 'invoices', 'consolidate' // accounting
        ];

        $actions = ['create', 'view', 'update', 'archive', 'unarchive'];

        foreach ($modules as $key => $module) {
            foreach ($actions as $key => $action) {
                // check if permission is already exists
                $isExists = \DB::table('permissions')->where('table_name', $module)->where('key', $action ."_".$module)->first();

                if(! $isExists )
                    \DB::table('permissions')->insert([
                        'table_name' => $module,
                        'key' => $action ."_".$module,
                    ]);
            }
        }

        // \DB::table('permission_role')->delete();

        // Give all the permissions to Super Admins
        $superAdminRoles = Role::where('name', 'superadmin')->orWhere('name', 'super_admin')->get();
        $permissions = \DB::table('permissions')->get();

        foreach ($superAdminRoles as $key => $superAdminRole) {
            foreach ($permissions as $key => $permission) {
                $isExists = \DB::table('permission_role')->where('permission_id', $permission->id)->where('role_id', $superAdminRole->id)->first();

                if(! $isExists )
                    \DB::table('permission_role')->insert([
                        'permission_id' => $permission->id,
                        'role_id' => $superAdminRole->id,
                    ]);
            }
        }

        // Give atlease dashboard permissions to other roles
        $otherRoles = Role::whereNot('name', 'superadmin')->get();
        $initialPermissions = ['dashboard'];
        $dashboardPermission = \DB::table('permissions')->whereIn('table_name', $initialPermissions)->get();
        foreach ($otherRoles as $key => $otherRole) {
            foreach ($dashboardPermission as $key => $permission) {
                $isExists = \DB::table('permission_role')->where('permission_id', $permission->id)->where('role_id', $otherRole->id)->first();

                if(! $isExists )
                    \DB::table('permission_role')->insert([
                        'permission_id' => $permission->id,
                        'role_id' => $otherRole->id,
                    ]);
            }
        }
    }
}
