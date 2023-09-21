<?php

namespace Tests\Feature;

use App\Models\User\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_registered_users_can_login(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $this->post('/submit', [
            'phone' => $user->phone
        ]);

        $this->post('/verify', [
            'phone' => $user->phone,
            'login_code' => $user->refresh()->login_code
        ])->assertRedirect('/users');
    }

    public function test_unregistered_users_cannot_login(): void
    {
        $this->post('/submit', [
            'phone' => '998900223123'
        ])->assertSessionHasErrors();
    }

    public function test_admin_can_create_users()
}
