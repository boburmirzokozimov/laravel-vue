<?php

namespace Database\Factories;

use App\Models\Branch\Branch;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class BranchFactory extends Factory
{
    protected $model = Branch::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'country_id' => rand(1, 20),
            'lat' => fake()->latitude(),
            'lon' => fake()->longitude(),
            'address' => fake()->address(),
            'contact_number' => fake()->phoneNumber()
        ];
    }
}
