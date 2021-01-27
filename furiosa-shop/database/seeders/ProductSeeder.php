<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 30; $i++) {
            $title =$faker->sentence(4);
            Product::create([
                'title' => $title,
                'slug' => $faker->slug,
                'subtitle' => $faker->sentence(5),
                'description' => $faker->text,
                'price' => $faker->numberBetween(15, 300) * 100,
                'image' => 'https://via.placeholder.com/450x450',
            ])->images()->attach([
                    rand(1, 4),
                    rand(1, 4)
            ]);

            
            $product = Product::find($i+1);
            
            $product->categories()->attach([
                rand(1, 4),
                rand(1, 4)
            ]);



            // $product = new Product();

            // $product->title = $faker->sentence(4);
            // $product->slug = $faker->slug;
            // $product->subtitle = $faker->sentence(5);
            // $product->description = $faker->text;
            // $product->price = $faker->numberBetween(15, 300) * 100;
            // $product->image = 'https://via.placeholder.com/450x450';

            // $product->images([
            //     rand(1, 4),
            //     rand(1, 4),
            // ]);

            // $product->categories([
            //     rand(1, 4), rand(1, 4)
            // ]);

            // $product->save();
        }
    }
}
