<?php

namespace Database\Seeders;

use App\Models\MainDestination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainDestinationSeeder extends Seeder
{
    public function run(): void
    {
        $MainDestinations = [
            ['name' => 'Bromo'],            
            ['name' => 'Air Terjun Tumpak Sewu'],
            ['name' => 'Kawah Ijen'],
        ];

        foreach ($MainDestinations as $d) {
            MainDestination::updateOrCreate(
                ['name' => $d['name']],
            );
        }
    }
}
