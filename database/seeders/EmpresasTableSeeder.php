<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empresa; // Asegúrate de importar el modelo Empresa

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear varias empresas de ejemplo
        Empresa::create([
            'nombre' => 'Empresa Uno',
            'logo' => 'logo1.png',
            'direccion' => 'Dirección Uno',
            'telefono' => '123456789',
            'celular' => '987654321',
            'correo' => 'empresauno@example.com',
            'link_pagina' => 'http://empresauno.com',
            'link_ubicacion' => 'http://maps.google.com/?q=empresauno',
            'ciudad_id' => 1, // Asegúrate de que este ID exista en la tabla ciudads
        ]);

        Empresa::create([
            'nombre' => 'Empresa Dos',
            'logo' => 'logo2.png',
            'direccion' => 'Dirección Dos',
            'telefono' => '223344556',
            'celular' => '665544332',
            'correo' => 'empresados@example.com',
            'link_pagina' => 'http://empresados.com',
            'link_ubicacion' => 'http://maps.google.com/?q=empresados',
            'ciudad_id' => 1, // Asegúrate de que este ID exista en la tabla ciudads
        ]);

        // Agrega más empresas según sea necesario
    }
}
