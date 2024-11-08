<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'reminder_create',
            ],
            [
                'id'    => 18,
                'title' => 'reminder_edit',
            ],
            [
                'id'    => 19,
                'title' => 'reminder_show',
            ],
            [
                'id'    => 20,
                'title' => 'reminder_delete',
            ],
            [
                'id'    => 21,
                'title' => 'reminder_access',
            ],
            [
                'id'    => 22,
                'title' => 'location_create',
            ],
            [
                'id'    => 23,
                'title' => 'location_edit',
            ],
            [
                'id'    => 24,
                'title' => 'location_show',
            ],
            [
                'id'    => 25,
                'title' => 'location_delete',
            ],
            [
                'id'    => 26,
                'title' => 'location_access',
            ],
            [
                'id'    => 27,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 28,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 29,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 30,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 31,
                'title' => 'payment_create',
            ],
            [
                'id'    => 32,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 33,
                'title' => 'payment_show',
            ],
            [
                'id'    => 34,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 35,
                'title' => 'payment_access',
            ],
            [
                'id'    => 36,
                'title' => 'credit_create',
            ],
            [
                'id'    => 37,
                'title' => 'credit_edit',
            ],
            [
                'id'    => 38,
                'title' => 'credit_show',
            ],
            [
                'id'    => 39,
                'title' => 'credit_delete',
            ],
            [
                'id'    => 40,
                'title' => 'credit_access',
            ],
            [
                'id'    => 41,
                'title' => 'pin_create',
            ],
            [
                'id'    => 42,
                'title' => 'pin_edit',
            ],
            [
                'id'    => 43,
                'title' => 'pin_show',
            ],
            [
                'id'    => 44,
                'title' => 'pin_delete',
            ],
            [
                'id'    => 45,
                'title' => 'pin_access',
            ],
            [
                'id'    => 46,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
