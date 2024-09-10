<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galeries = [
            [
                'photo' => 'default-image/gallery/1.jpg',
                'sub_destination_id' => 1
            ],    
            [
                'photo' => 'default-image/gallery/2.jpg',
                'sub_destination_id' => 2
            ],   
            [
                'photo' => 'default-image/gallery/3.jpg',
                'sub_destination_id' => 3
            ],   
            [
                'photo' => 'default-image/gallery/4.jpg',
                'sub_destination_id' => 4
            ],   
            [
                'photo' => 'default-image/gallery/5.jpg',
                'sub_destination_id' => 5
            ],   
            [
                'photo' => 'default-image/gallery/6.jpg',
                'sub_destination_id' => 6
            ],   
            [
                'photo' => 'default-image/gallery/7.jpg',
                'sub_destination_id' => 7
            ],   
            [
                'photo' => 'default-image/gallery/8.jpg',
                'sub_destination_id' => 8
            ],   
        ];
        
        foreach ($galeries as $g) {
            Gallery::updateOrCreate(
                ['photo' => $g['photo']],
                [
                    'sub_destination_id' => $g['sub_destination_id'],
                ]
            );
        }
    }
}
