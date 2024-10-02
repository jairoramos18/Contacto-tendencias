<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pais;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
          User::factory(1)->create();

            // Pais::factory(10)->create();

         Pais::factory()->create([
             'nombre' => 'Colombia', 
             'estado' => '1',
             'registradopor' => \App\Models\User::factory()
         ]);
    }
}
