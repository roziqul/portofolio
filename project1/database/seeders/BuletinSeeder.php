<?php

namespace Database\Seeders;

use App\Models\Buletin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuletinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buletin::factory()->count(5)->create();
    }
}
