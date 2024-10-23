<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactoFactory extends Factory
{
    protected $model = \App\Models\Contacto::class;

    public function definition()
    {
        return [
            'nombre_usuario' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'asunto' => $this->faker->sentence(),
            'mensaje' => $this->faker->paragraph(),
            'celular' => $this->faker->phoneNumber(),
            'estado' => $this->faker->randomElement(['activo', 'inactivo']), // Se añade el campo estado
        ];
    }
}
