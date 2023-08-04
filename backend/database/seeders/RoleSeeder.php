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
        $moderator = Role::create(['name' => 'moderator']);
        $operator = Role::create(['name' => 'operator']);

        $edit = Permission::create(['ability' => 'edit']);
        $see = Permission::create(['ability' => 'see']);
        $delete = Permission::create(['ability' => 'delete']);
        $create = Permission::create(['ability' => 'create']);

        $admin->givePermissionTo($create);
        $admin->givePermissionTo($edit);
        $admin->givePermissionTo($see);
        $admin->givePermissionTo($delete);

        $moderator->givePermissionTo($create);
        $moderator->givePermissionTo($edit);
        $moderator->givePermissionTo($see);
        $moderator->givePermissionTo($delete);

        $operator->givePermissionTo($create);
        $operator->givePermissionTo($edit);
        $operator->givePermissionTo($see);
        $operator->givePermissionTo($delete);

        $user = User::factory([
            'full_name' => 'Boburmirzo Kozimov',
            'phone' => 998000000000
        ])->create();

        $user->assignRole($admin->id);

        $user->save();
    }
}
