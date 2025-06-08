<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProductsSeed::class,
            CartSeeder::class,
            // Add other seeders here as needed
        ]);
    }
}
