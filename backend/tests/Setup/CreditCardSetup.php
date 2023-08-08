<?php

namespace Tests\Setup;

use App\Models\Client\Client;
use App\Models\Client\CreditCard\CreditCard;
use App\Models\Client\CreditCard\CreditCardRequest;

class CreditCardSetup
{
    protected ?Client $client = null;
    protected ?int $cardTransactions = null;

    public function ownedBy(Client $client): self
    {
        $this->client = $client;
        return $this;
    }


    public function create()
    {
        $card = CreditCard::factory()->create([
            'client_id' => $this->client->id ?? Client::factory(),
            'credit_card_request_id' => CreditCardRequest::factory()->create(['client_id' => $this->client->id])
        ]);

        return $card;
    }
}
