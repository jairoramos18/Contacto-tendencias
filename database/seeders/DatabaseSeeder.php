<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pais;
use Illuminate\Database\Seeder;
use App\Models\Contacto;
use App\Models\Empresa;
use App\Models\Ciudad;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crea un usuario y guarda la instancia
        $user = User::factory()->create();

        // Crea un país asignando el usuario previamente creado
        Pais::factory()->create([
            'nombre' => 'Colombia', 
            'estado' => '1',
            'registradopor' => $user->id, 
        ]);

        Contacto::factory()->count(2)->create();
        Empresa::factory()->count(2)->create();
    }
}
