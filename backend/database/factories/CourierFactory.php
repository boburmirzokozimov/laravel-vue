<?php

namespace Database\Factories;

use App\Models\Courier\Courier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Courier>
 */
class CourierFactory extends Factory
{
    protected $model = Courier::class;

    public function definition(): array
    {
        return [
            'country' => fake()->country(),
            'fullName' => fake()->name(),
            'phone' => fake()->randomNumber(9, true),
            'last_visited' => fake()->date(),
            'status' => fake()->randomElement(['active', 'inactive', 'blocked']),
        ];
    }
}
