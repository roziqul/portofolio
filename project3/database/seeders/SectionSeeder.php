<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            'A101','A102','A103','A104',
            'B101','B102','B103','B104',
            'C101','C102','C103','C104',
            'D101','D102','D103','D104'
        ];

        foreach ($sections as $listSections) {
            Section::query()->updateOrCreate([
                'name' => $listSections,
            ]);
        }
    }
}
