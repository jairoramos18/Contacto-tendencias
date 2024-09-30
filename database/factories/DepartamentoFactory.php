<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Departamento>
 */
class DepartamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pais_id' => \App\Models\Pais::factory(), // Asumiendo que tienes un factory para el modelo Pais
            'nombre' => $this->faker->unique()->word(), // Genera un nombre único
            'estado' => $this->faker->randomElement(['activo', 'inactivo']), // Estado aleatorio
            'registradopor' => $this->faker->name(), // Nombre de quien registró
        ];
    }
}
