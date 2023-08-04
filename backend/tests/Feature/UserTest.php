<?php

namespace Tests\Feature;

use App\Models\User\Role;
use App\Models\User\User;
use Tests\TestCase;

class UserTest extends TestCase
{

    /**
     * A basic feature test example.
     */
    public function test_admin_can_see_all_users(): void
    {
        $this->withoutExceptionHandling();
        $this->actingAsAdmin();

        $this->get('/users')
            ->assertOk();
    }

    public function test_guest_cannot_create_a_new_user(): void
    {
        $user = User::factory()->raw();

        $this->post('/users', $user);

        $this->assertDatabaseMissing('users', $user);
    }

    public function test_admin_can_create_a_new_user(): void
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $role = Role::create(['name' => 'admin']);

        $data = [
            'full_name' => 'string|required',
            'phone' => 123456789,
            'country' => 'required|string',
            'role_id' => $role->id
        ];

        $this->post('/users', $data)
            ->assertRedirect();

        $this->assertDatabaseHas('users', $data);
    }

    public function test_admin_can_delete_the_user(): void
    {
        $this->withoutExceptionHandling();
        $this->actingAsAdmin();

        $user = User::factory()->create();

        $this->delete($user->path())
            ->assertRedirect();

        $this->assertDatabaseMissing('users', [
            'id' => $user->id
        ]);
    }

    public function test_admin_can_update_the_user(): void
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $user = User::factory()->create();

        $this->patch($user->path(), [
            'full_name' => 'Boburmirzo',
            'phone' => $user->phone,
            'country' => $user->country,
            'is_active' => true,
            'is_banned' => true
        ]);

        $user->refresh();

        $this->assertDatabaseHas('users', [
            'full_name' => 'Boburmirzo',
            'is_active' => true,
            'is_banned' => true
        ]);
    }
}
