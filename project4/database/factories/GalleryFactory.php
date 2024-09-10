<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gallery>
 */
class GalleryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'photo' => $this->faker->imageUrl(),
            'sub_destination_id' => $this->faker->numberBetween(1, 7)
        ];
    }
}
