<?php

namespace Database\Seeders;

use App\Models\Quota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quota::query()->updateOrCreate([
            'quota' => 10,
        ]);
    }
}
