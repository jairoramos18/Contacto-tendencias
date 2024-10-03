<?php

// database/factories/CiudadFactory.php

namespace Database\Factories;

use App\Models\Ciudad;
use Illuminate\Database\Eloquent\Factories\Factory;

class CiudadFactory extends Factory
{
    protected $model = Ciudad::class;

    public function definition()
    {
        return [
            'departamento_id' => $this->faker->numberBetween(1, 10), // Ajusta según tu lógica
            'nombre' => $this->faker->city,
            'estado' => $this->faker->randomElement(['activo', 'inactivo']),
            'registradopor' => $this->faker->randomNumber(),
        ];
    }
}
