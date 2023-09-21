<?php

namespace Tests\Feature;

use App\Models\User\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_registered_user_can_login(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->post('/submit', [
            'phone' => $user->phone
        ]);
        $this->post('/verify', [
            'phone' => $user->phone,
            'login_code' => $user->login_code
        ])->assertRedirect('/users');
    }
}
