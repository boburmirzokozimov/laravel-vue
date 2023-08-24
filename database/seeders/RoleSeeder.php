<?php

namespace Database\Seeders;

use App\Models\User\Permission;
use App\Models\User\Role;
use App\Models\User\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $manager = Role::create(['name' => 'manager']);
        $operator = Role::create(['name' => 'operator']);

        $edit = Permission::create(['ability' => 'edit']);
        $see = Permission::create(['ability' => 'see']);
        $delete = Permission::create(['ability' => 'delete']);
        $create = Permission::create(['ability' => 'create']);
        $accept = Permission::create(['ability' => 'accept']);

        $admin->givePermissionTo($create);
        $admin->givePermissionTo($edit);
        $admin->givePermissionTo($see);
        $admin->givePermissionTo($delete);
        $admin->givePermissionTo($accept);

        $manager->givePermissionTo($create);
        $manager->givePermissionTo($edit);
        $manager->givePermissionTo($see);
        $manager->givePermissionTo($accept);

        $operator->givePermissionTo($create);
        $operator->givePermissionTo($edit);
        $operator->givePermissionTo($see);

        User::factory([
            'full_name' => 'Boburmirzo Kozimov',
            'phone' => 998000000000,
            'login_code' => '9999',
            'role_id' => $admin->id
        ])->create();
    }
}
