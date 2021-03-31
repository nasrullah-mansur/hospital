<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Photo::create([
            'image' => 'images/wound/1617168877-wound-image.jpg',
            'user_id' => 2
        ]);

        Photo::create([
            'image' => 'images/wound/1617168881-wound-image.jpg',
            'user_id' => 2
        ]);

        Photo::create([
            'image' => 'images/wound/1617168885-wound-image.jpg',
            'user_id' => 2
        ]);

        Photo::create([
            'image' => 'images/wound/1617168889-wound-image.jpg',
            'user_id' => 2
        ]);

        Photo::create([
            'image' => 'images/wound/1617168892-wound-image.jpg',
            'user_id' => 2
        ]);

        Photo::create([
            'image' => 'images/wound/1617168892-wound-image.jpg',
            'user_id' => 2
        ]);

        Photo::create([
            'image' => 'images/wound/1617168900-wound-image.jpg',
            'user_id' => 2
        ]);

        Photo::create([
            'image' => 'images/wound/1617168903-wound-image.jpg',
            'user_id' => 2
        ]);

        Photo::create([
            'image' => 'images/wound/1617168908-wound-image.jpg',
            'user_id' => 2
        ]);

    }
}
