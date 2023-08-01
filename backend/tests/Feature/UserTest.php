<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{

    /**
     * A basic feature test example.
     */
    public function test_admin_can_see_all_users(): void
    {
        $this->actingAsAdmin();

        $this->get('/users')
            ->assertOk();
    }

    public function test_admin_can_create_a_new_user(): void
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $new_user = User::factory(['remember_token' => null])->raw();

        $this->post('/users', $new_user)
            ->assertStatus(204);

        $this->assertDatabaseHas('users', $new_user);
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
