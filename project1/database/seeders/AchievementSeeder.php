<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    public function run(): void
    {
        $achievements = [
            ['photo' => 'https://pbs.twimg.com/media/GP_3aXnbcAArlc5.jpg', 
             'title' => 'Juara I Robotic Competition', 
             'student_name' => 'Budiono Siregar', 
             'year' => '2024'
            ],
            ['photo' => 'https://img-comment-fun.9cache.com/media/aDmerWO/a46R1Der_700w_0.jpg', 
             'title' => 'Juara I Russian IT Fest', 
             'student_name' => 'Budiono Siregar Kedua', 
             'year' => '2023'
            ],
            ['photo' => 'https://pbs.twimg.com/profile_images/1776576591336005632/E4wpV-pS_400x400.jpg', 
             'title' => 'Juara I USA Junior Mechanic Fest', 
             'student_name' => 'Beluga', 
             'year' => '2022'
            ],
            ['photo' => 'https://i.ytimg.com/vi/t0Q2otsqC4I/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLBgbkdHwq9v7C3DObsH54uBSf8hiw', 
             'title' => 'Juara I Euro Car Builder Competition', 
             'student_name' => 'Private', 
             'year' => '2020'
            ]
        ];        
    
        foreach ($achievements as $value) {
            Achievement::updateOrCreate(
                ['photo' => $value['photo']],
                [
                    'title' => $value['title'],
                    'student_name' => $value['student_name'],
                    'year' => $value['year']
                ]
            );
        }
    }
}
