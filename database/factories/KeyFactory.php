<?php

namespace Database\Factories;

use App\Models\Keys\Key;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Key>
 */
class KeyFactory extends Factory
{
    protected $model = Key::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_number_sepa' => fake()->randomNumber(9),
            'account_number_swift' => fake()->randomNumber(9),
            'wallet_number_erc' => fake()->randomNumber(9),
            'wallet_number_trc' => fake()->randomNumber(9),
        ];
    }
}
