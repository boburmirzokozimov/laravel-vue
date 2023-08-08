<?php

namespace Database\Seeders;

use App\Models\Client\Client;
use App\Models\Client\CreditCard\CreditCard;
use App\Models\Client\CreditCard\CreditCardRequest;
use Illuminate\Database\Seeder;

class CreditCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = Client::factory()->create();
        $credit_card_request = CreditCardRequest::factory()->create(['client_id' => $client->id]);

        CreditCard::factory(2)->create(['client_id' => $client->id, 'credit_card_request_id' => $credit_card_request->id]);
    }
}
