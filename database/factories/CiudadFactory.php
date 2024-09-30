<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CiudadFactory extends Factory
{
    protected $model = \App\Models\Ciudad::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->city(),
        ];
    }
}
