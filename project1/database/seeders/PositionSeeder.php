<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $positions = [
            ['name' => 'Guru Fisika'],
            ['name' => 'Guru Matematika'],
            ['name' => 'Guru Olahraga'],
            ['name' => 'Guru Kimia'],
            ['name' => 'Guru Bahasa Inggris'],
        ];

        foreach ($positions as $value) {
            Position::updateOrCreate(
                ['name' => $value['name']],
            );
        }
    }
}
