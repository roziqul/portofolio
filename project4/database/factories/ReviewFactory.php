<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'photo_customer' => fake()->imageUrl(500, 500, 'Customer', true, 'Faker'),
            'name' => $this->faker->name(),
            'sub_destination_id' => $this->faker->numberBetween(1, 9), 
            'review' => $this->faker->paragraph(),
            'documentation' => fake()->imageUrl(1920, 1080, 'Documentation', true, 'Faker'),
        ];
    }
}
