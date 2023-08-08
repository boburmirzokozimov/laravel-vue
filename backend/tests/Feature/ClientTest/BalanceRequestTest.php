<?php

namespace Tests\Feature\ClientTest;

use App\Models\Client\Client;
use Tests\TestCase;

class BalanceRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_admin_can_create_balance_request_advance(): void
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $client = Client::factory()->create();

        $credentials = [
            'type' => 'CASH',
            'country' => 'Uzbekistan',
            'currency' => 'SUM',
            'contact' => 'Boburmirzo Kozimov',
            'sum' => 3000,
            'phone' => '998900223123',
            'client_id' => $client->id,
            'withdraw' => true
        ];

        $this->post($client->clientPath() . '/manage-balance', $credentials)
            ->assertRedirect();

        $this->assertDatabaseHas('balance_requests', $credentials);
    }

    public function test_admin_can_create_balance_request_withdraw_by_cashless(): void
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $client = Client::factory()->create();

        $credentials = [
            'type' => 'CASHLESS',
            'currency' => 'SUM',
            'sum' => 3000,
            'withdraw_account_number' => '998900223123',
            'client_id' => $client->id,
            'withdraw' => true,
            'info' => 'Sth important written here'
        ];

        $this->post($client->clientPath() . '/manage-balance', $credentials)
            ->assertRedirect();

        $this->assertDatabaseHas('balance_requests', $credentials);
    }

    public function test_admin_can_create_balance_request_withdraw_by_usdt(): void
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $client = Client::factory()->create();

        $credentials = [
            'type' => 'USDT',
            'currency' => 'SUM',
            'sum' => 3000,
            'withdraw_wallet_number' => '998900223123',
            'client_id' => $client->id,
            'withdraw' => true,
            'info' => 'Sth important written here'
        ];

        $this->post($client->clientPath() . '/manage-balance', $credentials)
            ->assertRedirect();

        $this->assertDatabaseHas('balance_requests', $credentials);
    }

    public function test_admin_cannot_create_balance_request_withdraw_by_cashless_if_withdraw_false(): void
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $client = Client::factory()->create();

        $credentials = [
            'type' => 'CASHLESS',
            'currency' => 'SUM',
            'sum' => 3000,
            'withdraw_account_number' => '998900223123',
            'client_id' => $client->id,
            'withdraw' => false,
            'info' => 'Sth important written here'
        ];

        $this->post($client->clientPath() . '/manage-balance', $credentials)
            ->assertRedirect();

        $this->assertDatabaseMissing('balance_requests', $credentials);
    }
}
