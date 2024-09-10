<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
{
    $articles = [
        [
            'photo' => 'default-image/article/1.png',
            'title' => 'The Evolution of Automotive Design',
            'description' => 'Automotive design has witnessed radical changes since the early 20th century. From the angular, boxy shapes of the 1950s to the aerodynamic curves of modern cars, designers have constantly pushed the boundaries of form and function. This article explores the major trends in automotive design, including the shift towards sustainability and the integration of advanced technology in the design process. We’ll also look at how different regions, such as Europe, Japan, and the U.S., have influenced global car design trends over the decades.'
        ],
        [
            'photo' => 'default-image/article/2.png',
            'title' => 'Top 5 Iconic Sports Cars',
            'description' => 'Sports cars have long captured the imagination of car enthusiasts, offering speed, performance, and a sleek design that turns heads. In this article, we review five of the most iconic sports cars in history. From the Ferrari 250 GTO to the Porsche 911, these vehicles have not only broken speed records but have also defined what it means to drive in style. Whether for their innovative engineering or their undeniable aesthetic appeal, these cars have left an indelible mark on automotive history.'
        ],
        [
            'photo' => 'default-image/article/3.png',
            'title' => 'Electric Vehicles: The Future of Driving',
            'description' => 'As the automotive industry moves toward a more sustainable future, electric vehicles (EVs) are at the forefront of this transformation. In this article, we explore the growth of EVs, from early developments to the modern, high-performance electric cars we see today. We’ll cover the challenges faced by the industry, including battery technology and charging infrastructure, and how companies like Tesla, Rivian, and legacy automakers are reshaping the market. Discover what the future holds for electric mobility and how it will impact driving culture worldwide.'
        ],
        [
            'photo' => 'default-image/article/4.png',
            'title' => 'The Art of Car Customization',
            'description' => 'Car customization has evolved into an art form for many automotive enthusiasts. From body kits and aftermarket parts to interior upgrades and performance enhancements, car customization allows individuals to express their personal style and create a truly unique vehicle. In this article, we delve into the world of car customization, exploring the different types of modifications, the trends that have shaped the scene, and how social media has helped turn custom cars into a global phenomenon. Whether you’re into JDM tuning or European luxury modifications, this guide covers it all.'
        ],
        [
            'photo' => 'default-image/article/5.png',
            'title' => 'Mercedes-Benz: A Legacy of Innovation',
            'description' => 'Mercedes-Benz has long been synonymous with luxury, innovation, and precision engineering. This article takes a closer look at the storied history of the brand, from its early beginnings with Karl Benz’s invention of the motorcar to its present-day leadership in cutting-edge automotive technology. We’ll explore some of Mercedes-Benz’s most groundbreaking innovations, including the development of the first modern automobile, pioneering safety features, and the rise of the AMG performance division. Discover how this iconic brand continues to shape the future of mobility.'
        ],
        [
            'photo' => 'default-image/article/6.png',
            'title' => 'Top 10 Classic Cars Collectors Love',
            'description' => 'The allure of classic cars is undeniable, and for collectors, owning a piece of automotive history is a dream come true. In this article, we explore the top 10 classic cars that have stood the test of time, becoming highly sought-after among collectors. From the elegant Jaguar E-Type to the powerful Ford Mustang, these cars not only represent the pinnacle of design and performance for their era but also hold sentimental value for enthusiasts. Learn about the history, rarity, and value of these iconic vehicles, and why they continue to captivate collectors worldwide.'
        ],
    ];
    
    foreach ($articles as $a) {
        Article::updateOrCreate(
            ['photo' => $a['photo']],
            [
                'title' => $a['title'],
                'description' => $a['description'],
            ]
        );
    }
}

}
