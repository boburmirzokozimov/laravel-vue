<?php

namespace Tests\Unit;

use App\Models\Client\Client;
use Facades\Tests\Setup\CreditCardSetup;
use Tests\TestCase;

class CreditCardTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_credit_card_belongs_to_client(): void
    {
        $client = Client::factory()->create();

        $card = CreditCardSetup::ownedBy($client)->create();

        $this->assertInstanceOf(Client::class, $card->client);
    }

}
