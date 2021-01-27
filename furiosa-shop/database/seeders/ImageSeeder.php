<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::create([
            'name' => 'https://via.placeholder.com/450x450',
            'slug' => 'high-tech'
        ]);

        Image::create([
            'name' => 'https://via.placeholder.com/450x450',
            'slug' => 'livres'
        ]);

        Image::create([
            'name' => 'https://via.placeholder.com/450x450',
            'slug' => 'meubles'
        ]);

        Image::create([
            'name' => 'https://via.placeholder.com/450x450',
            'slug' => 'jeux'
        ]);

        Image::create([
            'name' => 'https://via.placeholder.com/450x450',
            'slug' => 'nourriture'
        ]);
    }
}
