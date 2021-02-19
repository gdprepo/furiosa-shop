<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'text' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam necessitatibus incidunt ut officiis explicabo inventore.",
            'adress' => '203 Fake St. Mountain View, San Francisco, California, FR',
            'phone' => '+1 232 3235 324',
            'email' => 'okok@gmail.com',
        ]);
    }
}
