<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            'name' => "slider1",
            'image' => 'https://via.placeholder.com/1200x600',
            'title' => 'One more for good measure',
            'description' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget
            metus. Nullam id dolor id nibh ultricies vehicula ut id elit.',
        ]);

        DB::table('sliders')->insert([
            'name' => "slider1",
            'image' => 'https://via.placeholder.com/1200x600',
            'title' => 'One more for good measure',
            'description' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget
            metus. Nullam id dolor id nibh ultricies vehicula ut id elit.',
        ]);

        DB::table('sliders')->insert([
            'name' => "slider1",
            'image' => 'https://via.placeholder.com/1200x600',
            'title' => 'One more for good measure',
            'description' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget
            metus. Nullam id dolor id nibh ultricies vehicula ut id elit.',
        ]);
    }
}
