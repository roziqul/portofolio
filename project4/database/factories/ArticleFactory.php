<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'photo' => fake()->imageUrl(1920, 1080, 'news', true, 'Faker'),
            'title' => fake()->sentence(),
            'description' => $this->generateLongDescription(),
        ];
    }

    protected function generateLongDescription(): string
    {
        $paragraphs = [];
        
        for ($i = 0; $i < 4; $i++) {
            $paragraphs[] = fake()->paragraphs(3, true); // Generate a paragraph with 3 sentences
        }

        return implode("\n\n", $paragraphs);
    }
}
