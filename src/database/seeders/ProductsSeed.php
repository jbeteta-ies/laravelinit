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

        for ($i = 0; $i < 20; $i++) {
            DB::table('products')->insert([
                'titulo' => $faker->word(),
                'descripcion' => $faker->sentence(),
                'precio' => $faker->randomFloat(2, 50, 500),
                'imagen' => 'https://via.placeholder.com/150', // Imagen de ejemplo
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
