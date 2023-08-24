<?php

namespace Database\Factories;

use App\Models\User\Role;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => fake()->name(),
            'country' => fake()->country(),
            'phone' => fake()->randomNumber(9, true),
            "role_id" => Role::factory(),
            'is_active' => fake()->boolean
        ];
    }

}
