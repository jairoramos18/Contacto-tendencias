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
        Schema::table('contactos', function (Blueprint $table) {
            // Agregar columnas si no existen
            if (!Schema::hasColumn('contactos', 'nombre_usuario')) {
                $table->string('nombre_usuario')->nullable();
            }
            if (!Schema::hasColumn('contactos', 'email')) {
                $table->string('email')->nullable();
            }
            if (!Schema::hasColumn('contactos', 'asunto')) {
                $table->string('asunto')->nullable();
            }
            if (!Schema::hasColumn('contactos', 'mensaje')) {
                $table->string('mensaje')->nullable();
            }
            if (!Schema::hasColumn('contactos', 'celular')) {
                $table->string('celular')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contactos', function (Blueprint $table) {
            // Eliminar columnas si es necesario
            $table->dropColumn(['nombre_usuario', 'email', 'asunto', 'mensaje', 'celular']);
        });
    }
};
