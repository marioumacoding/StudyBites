<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Background;

class BackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Background::insert([
            ['image_name' => 'image1', 'image_path' => 'backgrounds/image1.jpg'],
            ['image_name' => 'image2', 'image_path' => 'backgrounds/image2.jpg'],
            ['image_name' => 'image3', 'image_path' => 'backgrounds/image3.jpg'],
            ['image_name' => 'image4', 'image_path' => 'backgrounds/image4.jpg'],
            ['image_name' => 'image5', 'image_path' => 'backgrounds/image5.jpg'],
            ['image_name' => 'image6', 'image_path' => 'backgrounds/image6.jpg'],
            ['image_name' => 'image7', 'image_path' => 'backgrounds/image7.jpg'],
            ['image_name' => 'image8', 'image_path' => 'backgrounds/image8.jpg'],
            ['image_name' => 'image9', 'image_path' => 'backgrounds/image9.jpg'],
            ['image_name' => 'image10', 'image_path' => 'backgrounds/image10.jpg'],
            ['image_name' => 'image11', 'image_path' => 'backgrounds/image11.jpg'],
            ['image_name' => 'image12', 'image_path' => 'backgrounds/image12.jpg'],
            ['image_name' => 'image13', 'image_path' => 'backgrounds/image13.jpg'],
            ['image_name' => 'image14', 'image_path' => 'backgrounds/image14.jpg'],
            ['image_name' => 'image15', 'image_path' => 'backgrounds/image15.jpg'],
            ['image_name' => 'image16', 'image_path' => 'backgrounds/image16.jpg'],
            ['image_name' => 'image17', 'image_path' => 'backgrounds/image17.jpg'],
            ['image_name' => 'image18', 'image_path' => 'backgrounds/image18.jpg'],
            ['image_name' => 'image19', 'image_path' => 'backgrounds/image19.jpg'],
            ['image_name' => 'image20', 'image_path' => 'backgrounds/image20.jpg'],
        ]);
    }
}
