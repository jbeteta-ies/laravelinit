<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SIMCard;

class SIMCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SIMCard::Create([
            'serial_number' => '1234567890',
            'provider' => 'Verizon',
        ]);
        SIMCard::Create([
            'serial_number' => '1234567891',
            'provider' => 'Verizon',

        ]);
        SIMCard::Create([
            'serial_number' => '1234567892',
            'provider' => 'Verizon',
        ]);
    }
}
