<?php

namespace Tests\Feature;

use App\Models\Client\Client;
use Tests\TestCase;

class CreditCardRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_admin_can_create_credit_card_request(): void
    {
        $this->withoutExceptionHandling();

        $this->actingAsAdmin();

        $client = Client::factory()->create();

        $card = [
            'type' => 'CASH',
            'country' => 'Uzbekistan',
            'currency' => 'SUM',
            'contact' => 'Boburmirzo Kozimov',
            'sum' => 3000,
            'phone' => '998900223123',
            'client_id' => $client->id,
            'withdraw' => true
        ];

        $this->post($client->clientPath() . '/manage-balance', $card)
            ->assertRedirect();

        $this->assertDatabaseHas('balance_requests', $card);
    }
}
