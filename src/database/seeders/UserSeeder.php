<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Use bcrypt for hashing
        ]);
        User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => bcrypt('password'), // Use bcrypt for hashing
        ]);
        User::create([
            'name' => 'Donald Smith',
            'email' => 'donald@example.com',
            'password' => bcrypt('password'), // Use bcrypt for hashing
        ]);
        User::create([
            'name' => 'Mary',
            'email' => 'mary@example.com', 
            'password' => bcrypt('password'), // Use bcrypt for hashing
        ]);
    }
}
