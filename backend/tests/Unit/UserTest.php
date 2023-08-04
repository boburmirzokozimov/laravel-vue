<?php

namespace Tests\Unit;

use App\Models\User\Role;
use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_user_can_have_path(): void
    {
        $user = User::factory()->create();

        $this->assertEquals('/users/' . $user->id, $user->path());
    }

    public function test_user_can_have_role(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $role = Role::create(['name' => 'admin']);
        $user->assignRole($role->id);

        $this->assertInstanceOf(Role::class, $user->role);
    }
}
