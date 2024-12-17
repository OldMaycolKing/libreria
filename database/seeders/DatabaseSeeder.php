<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Ejecutar las semillas.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'name' => 'Administrador',
            'email' => 'admin@biblioteca.com',
            'password' => Hash::make('password123'), // Cambia esta contraseña por una segura
        ]);
    }
}
