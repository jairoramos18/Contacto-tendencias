<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->string('logo')->nullable(); 
            $table->string('direccion'); 
            $table->string('telefono')->nullable(); // Teléfono 
            $table->string('celular');
            $table->string('correo');
            $table->string('link_pagina')->nullable(); // Página web 
            $table->string('link_ubicacion')->nullable(); // Ubicación
            $table->bigInteger('ciudad_id')->unsigned(); // Relación con la tabla ciudads
            
           
            $table->foreign('ciudad_id')
                ->references('id')
                ->on('ciudads')
                ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
