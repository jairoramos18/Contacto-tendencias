<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTipodocumentosTable extends Migration
{
    public function up()
    {
        Schema::create('tipodocumentos', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('nombre');
			$table->string('abreviatura');
            $table->string('estado');
            $table->string('registradopor');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipodocumentos');
    }

   
}
