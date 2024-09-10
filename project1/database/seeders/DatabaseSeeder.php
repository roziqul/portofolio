<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AchievementSeeder::class);
        $this->call(AlumniGraduateSeeder::class);
        $this->call(BuletinSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(HeadmasterSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(UtilitySeeder::class);
        $this->call(ExtraculiculerSeeder::class);
        $this->call(HistorySeeder::class);
        $this->call(FacilitySeeder::class);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
