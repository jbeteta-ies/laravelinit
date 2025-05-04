<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('name', 'admin')->first();
        $jane = User::where('name', 'Jane Doe')->first();
        $donald = User::where('name', 'Donald Smith')->first();
        $mary = User::where('name', 'Mary')->first();

        $roleAdmin = Role::where('name', 'Administrador')->first();
        $roleEditor = Role::where('name', 'Editor')->first();
        $roleViewer = Role::where('name', 'Lector')->first();

        $admin->roles()->attach($roleAdmin->id, ['added_by' => 'sistema']);
        $jane->roles()->attach($roleEditor->id, ['added_by' => 'admin']);
        $jane->roles()->attach($roleViewer->id, ['added_by' => 'admin']);
        $donald->roles()->attach($roleViewer->id, ['added_by' => 'jane']);
        $mary->roles()->attach($roleViewer->id, ['added_by' => 'jane']);
        $mary->roles()->attach($roleEditor->id, ['added_by' => 'admin']);
    }
}
