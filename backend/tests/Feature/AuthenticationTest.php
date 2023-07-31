<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_guest_can_get_login_code_and_verify_it(): void
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/api/submit', [
            'phone' => '12345678990'
        ]);
        $login_code = $response->getOriginalContent()['login_code'];

        $response->assertStatus(200);

        $this->post('/api/verify', [
            'login_code' => $login_code,
            'phone' => '12345678990'
        ])
            ->assertOk();
    }
}
