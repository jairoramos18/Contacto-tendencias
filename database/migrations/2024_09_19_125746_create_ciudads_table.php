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
        if (!Schema::hasTable('ciudads')) {
            Schema::create('ciudads', function (Blueprint $table) {
                $table->id();
                // Hacer que departamento_id sea nullable
                $table->bigInteger('departamento_id')->unsigned()->nullable(); 
                $table->string('nombre');
                $table->string('estado')->default('activo');
                $table->string('registradopor');
                $table->timestamps();
                
                // Definir la relación
                $table->foreign('departamento_id')
                    ->references('id')
                    ->on('departamentos')
                    ->onDelete('set null'); // Opcional: Cambiar a NULL si el departamento se elimina
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ciudads');
    }
};
