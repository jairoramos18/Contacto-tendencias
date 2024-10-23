<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaisesModificadosTable extends Migration
{
    public function up()
    {
        Schema::table('paises', function (Blueprint $table) {
            // Eliminar la restricción unique en las columnas nombre y estado
            // Verificar si el índice existe antes de eliminarlo
            if (Schema::hasColumn('paises', 'nombre') && Schema::hasColumn('paises', 'estado')) {
                // Comprobar si el índice existe antes de intentar eliminarlo
                $indexExists = \DB::select("SHOW INDEX FROM paises WHERE Key_name = 'paises_nombre_estado_unique'");
                if (!empty($indexExists)) {
                    $table->dropUnique(['nombre', 'estado']);
                }
            }
        });
    }

    public function down()
    {
        Schema::table('paises', function (Blueprint $table) {
            // Restaurar la restricción unique en las columnas nombre y estado si es necesario
            $table->unique(['nombre', 'estado']);
        });
    }
}
