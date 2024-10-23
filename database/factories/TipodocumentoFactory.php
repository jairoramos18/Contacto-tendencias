<?php

namespace Database\Factories;

use App\Models\Tipodocumento;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipodocumentoFactory extends Factory
{
    /**
     * El nombre del modelo correspondiente a este factory.
     *
     * @var string
     */
    protected $model = Tipodocumento::class;

    /**
     * Define el estado por defecto del modelo.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'estado' => $this->faker->randomElement(['activo', 'inactivo']),
            'registradopor' => $this->faker->name,
            'abreviatura' => strtoupper($this->faker->lexify('???')),
        ];
    }
}
