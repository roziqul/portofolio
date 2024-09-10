<?php

namespace Database\Seeders;

use App\Models\Utility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UtilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Utility::create([
            'school_logo' => 'https://e7.pngegg.com/pngimages/92/937/png-clipart-sma-negeri-1-barabai-sma-negeri-39-jakarta-organisasi-siswa-intra-sekolah-high-school-logo-school-elementary-school-organization.png',
            'school_name' => 'SMA Contoh 1',
            'school_address' => 'Jl. Pendidikan No. 123, Kecamatan Contoh Kabupaten Contoh',
            'school_email' => 'info@sma-contoh.sch.id',
            'school_website' => 'https://www.sma-contoh.sch.id',
            'school_contact' => '+6281234567890',
            'school_vision' => 'Menjadi sekolah unggulan dalam pendidikan dan karakter.',
            'school_mission' => 'Menyelenggarakan pendidikan berkualitas untuk mencetak generasi berprestasi.',
            'school_goal' => 'Menyelenggarakan pendidikan berkualitas untuk mencetak generasi berprestasi.',
            'school_description' => 'SMA Contoh adalah institusi pendidikan menengah atas yang berdedikasi untuk membentuk generasi muda yang berkarakter, berpengetahuan, dan siap menghadapi tantangan global. Terletak di lingkungan yang nyaman dan kondusif untuk belajar, SMA Contoh telah menjadi pilihan utama bagi para siswa yang ingin mengejar prestasi akademik dan mengembangkan potensi diri secara holistik.',
            'school_photo' => 'https://brainpersonalities.com/wp-content/uploads/2021/11/brawwijjy-1536x864.jpg',
            'school_motto' => 'Oke Gaz Oke Gazzzz.',
            'total_class' => 36,
            'total_student' => 1200,
        ]);
    }
}