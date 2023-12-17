<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        // Asegúrate de que el rol ya esté creado
        $adminRole = Role::where('name', 'admin')->first();

        // Crea un usuario y asigna el rol de superadmin
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('superadmin123'),
        ]);

        // Asigna el rol al usuario
        $user->assignRole($adminRole);
    }
}