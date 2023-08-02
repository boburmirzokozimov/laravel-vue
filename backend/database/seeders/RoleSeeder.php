<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);
        $edit = Permission::create(['ability' => 'edit']);
        $see = Permission::create(['ability' => 'see']);
        $delete = Permission::create(['ability' => 'delete']);
        $create = Permission::create(['ability' => 'create']);

        $role->givePermissionTo($edit);
        $role->givePermissionTo($see);
        $role->givePermissionTo($delete);
        $role->givePermissionTo($create);

        $user = User::factory([
            'full_name' => 'Boburmirzo Kozimov',
            'phone' => 998000000000
        ])->create();

        $user->assignRole($role->id);

        $user->save();
    }
}
