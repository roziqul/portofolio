<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = [
            ['photo' => 'https://perpustakaan-supmtegal.com/wp-content/uploads/2024/03/perpustakaan-bank-indonesia-bi-kpw-jawa-barat-1_169.jpeg', 
             'name' => 'Perpustakaan', 
             'description' => 'Perpustakaan yang nyaman dengan koleksi buku yang lengkap, memberikan ruang baca yang tenang untuk siswa dan guru.',
            ],
            ['photo' => 'https://sma3jogja.sch.id/wp-content/uploads/2020/05/c09f0e00-8e9d-457e-a6f1-e331b61619fd.jpg', 
             'name' => 'Laboratorium Sains', 
             'description' => 'Laboratorium sains yang dilengkapi dengan peralatan modern untuk mendukung pembelajaran fisika, kimia, dan biologi.',
            ],
            ['photo' => 'https://superlive.id/storage/articles/aeae881e-e955-46c7-9b85-9823f5b56a7a.jpg', 
             'name' => 'Lapangan Sepakbola', 
             'description' => 'Lapangan sepak bola yang luas dan terawat untuk kegiatan olahraga dan pertandingan antar sekolah.',
            ],
            ['photo' => 'https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/84/2023/07/29/IMG-20230729-WA0006-1452721038.jpg', 
             'name' => 'Lapangan Basket', 
             'description' => 'Lapangan basket dengan standar internasional yang digunakan untuk latihan dan pertandingan.',
            ],
            ['photo' => 'https://cdns.klimg.com/bola.net/resized/810x540/library/upload/21/2024/04/996x664/shutterstock_2232470_addb954.jpg', 
             'name' => 'Lapangan Voli', 
             'description' => 'Lapangan voli yang dirancang khusus untuk mendukung kegiatan olahraga voli, baik untuk latihan maupun kompetisi.',
            ],
            ['photo' => 'https://stietribhakti.ac.id/wp-content/uploads/2022/03/MG_0575-scaled.jpg', 
             'name' => 'Lab Komputer', 
             'description' => 'Lab komputer dengan fasilitas internet dan perangkat yang mendukung pembelajaran teknologi dan informasi.',
            ],
            ['photo' => 'https://konten.usu.ac.id/storage/satker/22/statis/aula-serba-guna.jpeg', 
             'name' => 'Aula Serbaguna', 
             'description' => 'Aula serbaguna yang digunakan untuk acara sekolah, pertemuan, dan kegiatan ekstrakurikuler.',
            ],
            ['photo' => 'https://bpkpenabur.or.id/media/nbjhjs3f/kantin-sekolah.jpg', 
             'name' => 'Kantin Sehat', 
             'description' => 'Kantin yang bersih dan nyaman dengan berbagai pilihan makanan sehat untuk siswa dan guru.',
            ],
            ['photo' => 'https://amsangaji.sbm.sch.id/wp-content/uploads/2023/02/17.jpg', 
             'name' => 'Ruang Musik', 
             'description' => 'Ruang khusus untuk pelajaran musik yang dilengkapi dengan berbagai alat musik seperti piano, gitar, dan drum.',
            ],
            ['photo' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgPh8gmUss6NXXKLPabBvSEv4yTPLYVAMc4lMZTTBlXFP92pc6Df3Z_R9FdReYFOcaz4xY6WtSKIeIb7_NwoP_IAw2lFA4R2_THkgeGLct2NCsntTg33lYHIU17Hx0fgXEzZPmEqUCrFl8T/s2048/P_20161217_080718.jpg', 
             'name' => 'Ruang Kesenian', 
             'description' => 'Ruang seni untuk kegiatan menggambar, melukis, dan berbagai kegiatan kreatif lainnya, lengkap dengan perlengkapan seni.',
            ],
            ['photo' => 'https://sman1plemahan.sch.id/asset/foto_statis/tempat_tidur_uks.jpg', 
             'name' => 'Ruang UKS', 
             'description' => 'Ruang Unit Kesehatan Sekolah (UKS) yang menyediakan layanan kesehatan dan pertolongan pertama bagi siswa.',
            ],
            ['photo' => 'https://sdmtponorogo.com/wp-content/uploads/2020/01/IMG-20200106-WA0025.jpg', 
             'name' => 'Parkiran Sepeda Motor', 
             'description' => 'Area parkir yang aman dan luas untuk sepeda, mendorong siswa untuk menggunakan transportasi ramah lingkungan.',
            ]
        ];
        
        foreach ($facilities as $value) {
            Facility::updateOrCreate(
                ['photo' => $value['photo']],
                [
                    'name' => $value['name'],
                    'description' => $value['description'],
                ]
            );
        }
    }
}
