<?php

namespace Tests;

use App\Models\User\Permission;
use App\Models\User\Role;
use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    public function actingAsAdmin(): void
    {
        $admin = Role::create(['name' => 'admin']);

        $edit = Permission::create(['ability' => 'edit']);
        $see = Permission::create(['ability' => 'see']);
        $delete = Permission::create(['ability' => 'delete']);
        $create = Permission::create(['ability' => 'create']);

        $admin->givePermissionTo($create);
        $admin->givePermissionTo($edit);
        $admin->givePermissionTo($see);
        $admin->givePermissionTo($delete);

        $user = User::factory([
            'full_name' => 'Boburmirzo Kozimov',
            'phone' => 998000000000
        ])->create();

        $user->assignRole($admin->id);

        $user->save();

        $this->actingAs($user);
    }
}
