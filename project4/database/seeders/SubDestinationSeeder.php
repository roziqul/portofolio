<?php

namespace Database\Seeders;

use App\Models\SubDestination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubDestinationSeeder extends Seeder
{
    public function run(): void
    {
        $SubDestinations = [
            [
                'name' => 'Bukit Perahu',
                'main_destination_id' => 1,
                'photo' => 'default-image/subdestination/1.jpeg'
            ],
            [
                'name' => 'Bukit Kingkong',
                'main_destination_id' => 1,
                'photo' => 'default-image/subdestination/2.jpg'
            ],
            [
                'name' => 'Widodaren',
                'main_destination_id' => 1,
                'photo' => 'default-image/subdestination/3.jpg'
            ],
            [
                'name' => 'Kawah Bromo',
                'main_destination_id' => 1,
                'photo' => 'default-image/subdestination/4.jpg'        
            ],
            [
                'name' => 'Panorama',
                'main_destination_id' => 2,
                'photo' => 'default-image/subdestination/5.jpg'
            ],
            [
                'name' => 'Telaga Biru',
                'main_destination_id' => 2,
                'photo' => 'default-image/subdestination/6.webp'
            ],
            [
                'name' => 'Goa Tetes',
                'main_destination_id' => 2,
                'photo' => 'default-image/subdestination/7.jpg'
            ],   
            [
                'name' => 'Kawah Ijen',
                'main_destination_id' => 3,
                'photo' => 'default-image/subdestination/8.jpg'
            ],           
        ];
        
        foreach ($SubDestinations as $s) {
            SubDestination::updateOrCreate(
                ['name' => $s['name']],
                [
                    'main_destination_id' => $s['main_destination_id'],
                    'photo' => $s['photo'],
                ]
            );
        }
    }
}
