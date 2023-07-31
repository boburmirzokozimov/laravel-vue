<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    public function actingAsAdmin()
    {
        $response = $this->post('/api/submit', [
            'phone' => '12345678990'
        ]);
        $login_code = $response->getOriginalContent()['login_code'];

        $response->assertStatus(200);

        $res = $this->post('/api/verify', [
            'login_code' => $login_code,
            'phone' => '12345678990'
        ]);

        $this->withToken($res->content());
    }
}
