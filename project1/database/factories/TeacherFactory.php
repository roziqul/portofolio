<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'photo' => fake()->imageUrl(900, 1200, 'people', true, 'Teacher Photo'),
            'name' => fake()->name(),
            'nip' => fake()->numerify('##########'),
            'position_id' => fake()->numberBetween(1, 4),
        ];
    }
}
