<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Serial>
 */
class SerialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'catalog_id' => fake()->numberBetween(1, 15),
            'serial_number' => fake()->unique()->numberBetween(11111111, 99999999),
            'status' => 'available'
        ];
    }
}
