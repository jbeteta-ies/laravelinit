<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Phone;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Phone::create([
            'prefix' => '34',
            'number' => '1234567890',
            'user_id' => 1,
            'sim_card_id' => 1,
        ]);

        Phone::create([
            'prefix' => '34',
            'number' => '0987654321',
            'user_id' => 2,
            'sim_card_id' => 2,
        ]);

        Phone::create([
            'prefix' => '34',
            'number' => '1122334455',
            'user_id' => 3,
            'sim_card_id' => 3,
        ]);
    }   
}
