<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $reviews = [
            [
                'photo_customer' => 'default-image/review/customer/1.png',
                'name' => 'John Doe',
                'sub_destination_id' => 1,
                'review' => 'Amazing experience, would definitely recommend!',
                'documentation' => 'default-image/review/documentation/1.jpg'
            ],
            [
                'photo_customer' => 'default-image/review/customer/2.png',
                'name' => 'Jane Smith',
                'sub_destination_id' => 2,
                'review' => 'A fantastic journey through the mountains.',
                'documentation' => 'default-image/review/documentation/2.jpg'
            ],
            [
                'photo_customer' => 'default-image/review/customer/3.jpg',
                'name' => 'James Williams',
                'sub_destination_id' => 3,
                'review' => 'Beautiful scenery, and a relaxing atmosphere.',
                'documentation' => 'default-image/review/documentation/3.jpg'
            ],
            [
                'photo_customer' => 'default-image/review/customer/4.png',
                'name' => 'Emily Johnson',
                'sub_destination_id' => 4,
                'review' => 'Loved every minute of it! So much to explore.',
                'documentation' => 'default-image/review/documentation/4.jpg'
            ],
            [
                'photo_customer' => 'default-image/review/customer/5.png',
                'name' => 'Michael Brown',
                'sub_destination_id' => 5,
                'review' => 'The trip was well-organized and fun!',
                'documentation' => 'default-image/review/documentation/5.jpg'
            ],
            [
                'photo_customer' => 'default-image/review/customer/6.png',
                'name' => 'Sarah Davis',
                'sub_destination_id' => 6,
                'review' => 'Great service and unforgettable moments.',
                'documentation' => 'default-image/review/documentation/6.jpg'
            ],
        ];

        foreach ($reviews as $r) {
            Review::updateOrCreate(
                ['photo_customer' => $r['photo_customer']],
                [
                    'name' => $r['name'],
                    'sub_destination_id' => $r['sub_destination_id'],
                    'review' => $r['review'],
                    'documentation' => $r['documentation']
                ]
            );
        }
    }
}
