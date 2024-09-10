<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $features = [
            'PENDAFTARAN','SELEKSI','PERANKINGAN','DAFTAR ULANG'
        ];

        foreach ($features as $listFeatures) {
            Feature::query()->updateOrCreate([
                'fitur' => $listFeatures,
            ]);
        }
    }
}
