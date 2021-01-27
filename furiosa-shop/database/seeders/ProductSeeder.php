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
            // $product = Product::create([
            //     'title' => $faker->sentence(4),
            //     'slug' => $faker->slug,
            //     'subtitle' => $faker->sentence(5),
            //     'description' => $faker->text,
            //     'price' => $faker->numberBetween(15, 300) * 100,
            //     'image' => 'https://via.placeholder.com/450x450',
            // ])
            //     ->images()->attach([
            //         1,
            //         2,
            //     ])
            //     ->categories()->attach([
            //         1,
            //         2,
            //     ]);

            $product = new Product();

            $product->title = $faker->sentence(4);
            $product->slug = $faker->slug;
            $product->subtitle = $faker->sentence(5);
            $product->description = $faker->text;
            $product->price = $faker->numberBetween(15, 300) * 100;
            $product->image = 'https://via.placeholder.com/450x450';

            $product->images([
                rand(1, 4),
                rand(1, 4),
            ]);

            $product->categories([
                rand(1, 4), rand(1, 4)
            ]);

            $product->save();
        }
    }
}
