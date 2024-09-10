<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Headmaster>
 */
class HeadmasterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'photo' => fake()->imageUrl(900, 900, 'news', true, 'Faker'),
            'name' => fake()->name(),
            'speech' => fake()->sentence(90),
        ];
    }
}
