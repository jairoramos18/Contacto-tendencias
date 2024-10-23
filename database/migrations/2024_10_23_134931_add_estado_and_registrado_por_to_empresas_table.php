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
        Schema::table('empresas', function (Blueprint $table) {
            $table->boolean('estado')->default(1); // Columna para el estado, valor por defecto 1 (activo)
            $table->bigInteger('registrado_por')->unsigned()->nullable(); // Columna para el usuario que registró la empresa, permitiendo valores nulos
            
            // Si la columna registrado_por se relaciona con la tabla de usuarios, puedes agregar la siguiente línea para la clave foránea
            $table->foreign('registrado_por')
                ->references('id')
                ->on('users')
                ->onDelete('set null'); // Si se elimina el usuario, el campo se establecerá en null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('empresas', function (Blueprint $table) {
            $table->dropForeign(['registrado_por']); // Elimina la relación foránea
            $table->dropColumn('estado'); // Elimina la columna estado
            $table->dropColumn('registrado_por'); // Elimina la columna registrado_por
        });
    }
};
