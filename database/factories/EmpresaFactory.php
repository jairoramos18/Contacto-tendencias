<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    protected $model = \App\Models\Empresa::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->company(),
            'logo' => $this->faker->imageUrl(100, 100, 'business'),
            'direccion' => $this->faker->address(),
            'telefono' => $this->faker->phoneNumber(),
            'celular' => $this->faker->phoneNumber(),
            'correo' => $this->faker->companyEmail(),
            'link_pagina' => $this->faker->url(),
            'link_ubicacion' => $this->faker->url(),
            'ciudad_id' => \App\Models\Ciudad::factory(),
        ];
    }
}
