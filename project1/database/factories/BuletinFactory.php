<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buletin>
 */
class BuletinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'photo' => fake()->imageUrl(1920, 1080, 'news', true, 'Faker'),
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(3),
        ];
    }
}
