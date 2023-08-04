<?php

namespace Tests\Unit;

use App\Models\User\Permission;
use App\Models\User\Role;
use Tests\TestCase;

class RolePermissionTest extends TestCase
{
    public function test_permission_can_be_assigned_to_role()
    {
        $role = Role::create(['name' => 'admin']);

        $all = Permission::create(['ability' => 'view']);
        $role->givePermissionTo($all);
        $this->assertDatabaseCount('role_has_permission', 1);

        $edit = Permission::create(['ability' => 'edit']);
        $role->givePermissionTo($edit);
        $this->assertDatabaseCount('role_has_permission', 2);

        $edit = Permission::create(['ability' => 'delete']);
        $role->givePermissionTo($edit);
        $this->assertDatabaseCount('role_has_permission', 3);
    }
}
