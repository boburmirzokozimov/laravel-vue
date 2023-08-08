<?php

namespace Tests\Unit;

use App\Models\Client\BalanceRequest;
use App\Models\Client\Client;
use App\Models\Client\CreditCard\CreditCardRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_client_can_have_path(): void
    {
        $client = Client::factory()->create();

        $this->assertEquals('/clients/' . $client->id, $client->clientPath());
    }

    public function test_client_can_have_balance(): void
    {
        $client = Client::factory()->create();
        BalanceRequest::factory()->create(['client_id' => $client->id]);
        $this->assertInstanceOf(BalanceRequest::class, $client->balanceRequest()->first());
    }

    public function test_client_can_have_card(): void
    {
        $client = Client::factory()->create();

        CreditCardRequest::factory()->create(['client_id' => $client->id]);

        $this->assertInstanceOf(CreditCardRequest::class, $client->creditCardRequest()->first());
    }
}
