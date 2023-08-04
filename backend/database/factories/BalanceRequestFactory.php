<?php

namespace Database\Factories;

use App\Models\Client\BalanceRequest;
use App\Models\Client\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BalanceRequest>
 */
class BalanceRequestFactory extends Factory
{
    protected $model = BalanceRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['CASH', 'CASHLESS', 'USDT']),
            'country' => fake()->country(),
            'currency' => fake()->currencyCode(),
            'sum' => fake()->randomNumber(5, true),
            'contact' => fake()->name(),
            'phone' => fake()->randomNumber(9, true),
            'client_id' => Client::factory(),
            'withdraw' => fake()->boolean
        ];
    }
}
