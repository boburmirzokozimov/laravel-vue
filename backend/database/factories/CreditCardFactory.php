<?php

namespace Database\Factories;

use App\Models\Client\Client;
use App\Models\Client\CreditCard\CreditCard;
use App\Models\Client\CreditCard\CreditCardRequest;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class CreditCardFactory extends Factory
{
    protected $model = CreditCard::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => Client::factory(),
            'credit_card_request_id' => CreditCardRequest::factory(),
            'card_number' => fake()->creditCardNumber(),
            'balance' => 0,
            'expire_date' => fake()->creditCardExpirationDate()
        ];
    }
}
