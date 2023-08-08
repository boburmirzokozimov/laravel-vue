<?php

namespace Database\Factories;

use App\Models\Client\CreditCard\CardTransaction;
use App\Models\Client\CreditCard\CreditCard;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class CardTransactionFactory extends Factory
{
    protected $model = CardTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'credit_card_id' => CreditCard::factory(),
            'sum' => fake()->numberBetween(0, 10000000),
            'type' => fake()->randomElement(['SEPA', 'SWIFT']),
            'status' => fake()->randomElement(['OPEN', 'CLOSED']),
            'invoice_file' => '',
            'card_number' => fake()->creditCardNumber(),
            'withdraw' => fake()->boolean,
        ];
    }
}
