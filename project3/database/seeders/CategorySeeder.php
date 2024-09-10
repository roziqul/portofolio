<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Fictional','Non-Fictional','Education',
            'Kids','Religion','Self-Help',
            'Comics','Mystery'
        ];

        foreach ($categories as $listCategories) {
            Category::query()->updateOrCreate([
                'name' => $listCategories,
            ]);
        }
    }
}
