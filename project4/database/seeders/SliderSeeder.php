<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $sliders = [
            [
                'photo' => 'default-image/slider/1.jpg',
                'title' => 'Mt. Bromo',
                'description' => 'Mount Bromo is an active volcano located in East Java, Indonesia. It is renowned for its breathtaking sunrise views and its surreal landscape, which includes a vast sea of sand surrounded by a rugged caldera.'
            ],
            [
                'photo' => 'default-image/slider/2.jpg',
                'title' => 'Tumpak Sewu Waterfall',
                'description' => 'Tumpak Sewu Waterfall, also known as "The Thousand Waterfalls," is a stunning tiered waterfall located in Lumajang, East Java, Indonesia. Nestled in a lush tropical forest, it cascades down in a semicircular formation from a height of approximately 120 meters, offering a breathtaking panoramic view.'
            ],
            [
                'photo' => 'default-image/slider/3.jpg',
                'title' => 'Kawah Ijen',
                'description' => 'Kawah Ijen is a famous volcanic crater in East Java, Indonesia, known for its striking turquoise sulfur lake and unique blue flames that appear at night due to ignited sulfuric gases. Located within the Ijen volcano complex, it is the worlds largest acidic crater lake.'
            ]   
        ];
        
        foreach ($sliders as $s) {
            Slider::updateOrCreate(
                ['photo' => $s['photo']],
                [
                    'title' => $s['title'],
                    'description' => $s['description'],
                ]
            );
        }
    }
}
