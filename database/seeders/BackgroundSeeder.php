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
        Background::create(['image_name' => 'Forest', 'image_path' => 'backgrounds/forest.jpg']);
        Background::create(['image_name' => 'Ocean', 'image_path' => 'backgrounds/ocean.jpg']);
    }
}
