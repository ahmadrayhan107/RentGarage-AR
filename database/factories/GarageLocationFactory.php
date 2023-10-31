<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GarageLocation>
 */
class GarageLocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'street_name' => fake()->streetName(),
            'address_number' => fake()->numberBetween(0,100),
            'city' => fake()->city(),
            'province' => fake()->state(),
            'postal_code' => fake()->postCode(),
        ];
    }
}
