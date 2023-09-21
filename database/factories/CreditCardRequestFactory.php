<?php

namespace Database\Factories;

use App\Models\Client\Client;
use App\Models\Client\CreditCard\CreditCardRequest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends Factory<Model>
 */
class CreditCardRequestFactory extends Factory
{
    protected $model = CreditCardRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => Client::factory(),
            'name' => fake()->name(),
            'surname' => fake()->lastName(),
            'middle_name' => fake()->name(),
            'phone' => fake()->randomNumber(9, true),
            'birth_date' => fake()->date(),
            'scan_passport' => null,
            'selfie_passport' => null,
            'status' => fake()->randomElement(['PENDING', 'RELEASED'])
        ];
    }
}
