<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductsSeed extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $images = ['bottle-1.png', 'bottle-2.png', 'bottle-3.png'];

        for ($i = 0; $i < 20; $i++) {
            DB::table('products')->insert([
                'titulo' => $faker->word(),
                'descripcion' => $faker->sentence(),
                'precio' => $faker->randomFloat(2, 50, 500),
                'imagen' => $images[rand(1,3) - 1], // Imagen de ejemplo
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
