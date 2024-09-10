<?php

namespace Database\Seeders;

use App\Models\AlumniGraduate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumniGraduateSeeder extends Seeder
{
    public function run(): void
    {
        $alumnis = [
            ['photo' => 'https://www.shutterstock.com/shutterstock/photos/772402006/display_1500/stock-vector-default-avatar-photo-placeholder-profile-icon-772402006.jpg', 
             'name' => 'Siswa Dummy Pertama', 
             'accepted_at' => 'Universitas Brawijaya', 
             'accepted_desc' => 'Teknik Informatika',
             'year' => '2023'
            ],
            ['photo' => 'https://www.shutterstock.com/shutterstock/photos/229692004/display_1500/stock-vector-man-avatar-profile-picture-vector-illustration-eps-229692004.jpg', 
             'name' => 'Siswa Dummy Kedua', 
             'accepted_at' => 'Universitas Negeri Malang', 
             'accepted_desc' => 'Pendidikan Fisika',
             'year' => '2020'
            ]
        ];        
    
        foreach ($alumnis as $value) {
            AlumniGraduate::updateOrCreate(
                ['photo' => $value['photo']],
                [
                    'name' => $value['name'],
                    'accepted_at' => $value['accepted_at'],
                    'accepted_desc' => $value['accepted_desc'],
                    'year' => $value['year']
                ]
            );
        }
    }
}
