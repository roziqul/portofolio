<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'address' => 'Karya Timur Wonosari ( Home Inside ) 26 E-F Blimbing - Malang',
            'email' => 'suncatcherstourandtravel@gmail.com',
            'contact_wa' => '+6282227231618',
            'contact_wechat' => 'Suncatchers',
            'facebook' => '#',
            'tiktok' => '#',
            'instagram' => 'https://www.instagram.com/suncatchers88/',
        ]);
    }
}
