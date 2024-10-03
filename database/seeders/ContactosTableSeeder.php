<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contacto; // Asegúrate de importar el modelo Contacto

class ContactosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear varios contactos de ejemplo
        Contacto::create([
            'nombre_usuario' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'asunto' => 'Consulta sobre producto',
            'mensaje' => 'Me gustaría saber más sobre el producto X.',
            'celular' => '123456789',
        ]);

        Contacto::create([
            'nombre_usuario' => 'María López',
            'email' => 'maria@example.com',
            'asunto' => 'Reclamo',
            'mensaje' => 'Tengo un reclamo sobre mi última compra.',
            'celular' => '987654321',
        ]);

        // Agrega más contactos según sea necesario
    }
}
