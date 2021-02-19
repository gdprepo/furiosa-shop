<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abouts')->insert([
            'title' => "ABOUT",
            'image' => 'https://via.placeholder.com/900x300',
            'img_profile' => 'https://via.placeholder.com/500x500',
            'text' => 'Artiste. tatoueuse art peinture tableau',
            'description' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget
            metus. Nullam id dolor id nibh ultricies vehicula ut id elit.',
        ]);
    }
}
