<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Phone;
use App\Models\User;

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
            'user_id' => User::where('name', 'Admin')->first()->id,
        ]);

        Phone::create([
            'prefix' => '34',
            'number' => '0987654321',
            'user_id' =>  User::where('name', 'Admin')->first()->id,
        ]);

        Phone::create([
            'prefix' => '34',
            'number' => '1122334455',
            'user_id' =>  User::where('name', 'Admin')->first()->id,
        ]);
    }
}
