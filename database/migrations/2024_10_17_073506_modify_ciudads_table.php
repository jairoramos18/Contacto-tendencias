<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ModifyCiudadsTable extends Migration
{
    public function up()
    {
        Schema::table('ciudads', function (Blueprint $table) {
            // Modificar departamento_id para que no sea nullable
            $table->bigInteger('departamento_id')->unsigned()->nullable(false)->change();
            
            // Comprobar si la clave foránea existe antes de intentar eliminarla
            $foreignKeyExists = DB::select("SELECT * FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_NAME = 'ciudads' AND CONSTRAINT_NAME = 'ciudads_departamento_id_foreign'");
            if (!empty($foreignKeyExists)) {
                // Actualizar la relación foránea y quitar el onDelete('set null')
                $table->dropForeign(['departamento_id']);
            }
            
            // Definir nuevamente la relación foránea sin onDelete('set null')
            $table->foreign('departamento_id')
                ->references('id')->on('departamentos');
        });
    }

    public function down()
    {
        Schema::table('ciudads', function (Blueprint $table) {
            // Revertir departamento_id a nullable
            $table->bigInteger('departamento_id')->unsigned()->nullable()->change();

            // Comprobar si la clave foránea existe antes de intentar eliminarla
            $foreignKeyExists = DB::select("SELECT * FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_NAME = 'ciudads' AND CONSTRAINT_NAME = 'ciudads_departamento_id_foreign'");
            if (!empty($foreignKeyExists)) {
                // Restaurar la relación con onDelete('set null')
                $table->dropForeign(['departamento_id']);
                $table->foreign('departamento_id')
                    ->references('id')->on('departamentos')
                    ->onDelete('set null');
            }
        });
    }
}

