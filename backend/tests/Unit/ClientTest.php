<?php

namespace Tests\Unit;

use App\Models\Client\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_user_can_have_path(): void
    {
        $client = Client::factory()->create();

        $this->assertEquals('/clients/' . $client->id, $client->clientPath());
    }

}
