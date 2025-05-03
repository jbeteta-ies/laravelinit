<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

use function Laravel\Prompts\password;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'Backup',
            'email' => 'backup@example.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'NoPhone',
            'email' => 'nophone@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
