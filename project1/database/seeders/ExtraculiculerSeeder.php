<?php

namespace Database\Seeders;

use App\Models\Extraculiculer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExtraculiculerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $extras = [
            ['photo' => 'https://www.fajarpendidikan.co.id/wp-content/uploads/2023/07/pramuka.jpg', 
             'name' => 'Pramuka', 
             'training_days' => 'Jumat',
             'training_time' => '14.00 - 17.15'
            ],
            ['photo' => 'https://smait.nurulihsan.sch.id/wp-content/uploads/2017/07/kir.jpeg', 
             'name' => 'Karya Ilmiah Remaja', 
             'training_days' => 'Selasa',
             'training_time' => '15.00 - 17.00'
            ],
            ['photo' => 'https://miftahulhuda.org/wp-content/uploads/2022/10/IMG_0434-scaled-1.jpg', 
             'name' => 'Rohani Islam', 
             'training_days' => 'Senin, Kamis',
             'training_time' => '15.00 - 18.00'
            ],
            ['photo' => 'https://smabmone.sch.id/wp-content/uploads/2018/12/sman1babakanmadang-smabmone-bmone-ekstrakurikuler-paskibra-1.jpg', 
             'name' => 'Paskibra', 
             'training_days' => 'Senin, Rabu, Jumat',
             'training_time' => '15.00 - 19.00'
            ],
            ['photo' => 'https://smabmone.sch.id/wp-content/uploads/2018/12/sman1babakanmadang-smabmone-bmone-ekstrakurikuler-pmr-1.jpg', 
             'name' => 'Palang Merah Remaja', 
             'training_days' => 'Rabu',
             'training_time' => '15.00 - 17.30'
            ],
            ['photo' => 'https://www.smk-korpri-mjl.sch.id/uploads/images/6816e99b95885a0b50471a178dcd3793.jpeg', 
             'name' => 'Bulutangkis', 
             'training_days' => 'Senin, Kamis',
             'training_time' => '15.00 - 18.00'
            ],
            ['photo' => 'https://smabmone.sch.id/wp-content/uploads/2018/12/sman1babakanmadang-smabmone-bmone-ekstrakurikuler-basket-4.jpg', 
             'name' => 'Basket', 
             'training_days' => 'Selasa, Rabu',
             'training_time' => '15.00 - 19.00'
            ],
            ['photo' => 'https://panditfootball.com/content/uploads/2015/09/Brazilian-Football-Academy.jpg', 
             'name' => 'Sepakbola', 
             'training_days' => 'Senin, Kamis',
             'training_time' => '15.00 - 18.30'
            ]
        ];        
    
        foreach ($extras as $value) {
            Extraculiculer::updateOrCreate(
                ['photo' => $value['photo']],
                [
                    'name' => $value['name'],
                    'training_days' => $value['training_days'],
                    'training_time' => $value['training_time'],
                ]
            );
        }
    }
}
