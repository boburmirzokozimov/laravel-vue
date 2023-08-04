<?php

namespace Database\Factories;

use App\Models\Client\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Client>
 */
class ClientFactory extends Factory
{
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => fake()->name(),
            'phone' => fake()->randomNumber(9, true),
            'auth_key' => fake()->sentence(),
            'is_active' => fake()->boolean
        ];
    }
}
