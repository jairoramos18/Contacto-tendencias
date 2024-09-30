<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('empresas', function (Blueprint $table) {
            $table->string('nombre')->nullable();
            $table->string('logo')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('correo')->nullable();
            $table->string('link_pagina')->nullable();
            $table->string('link_ubicacion')->nullable();
            $table->bigInteger('ciudad_id')->unsigned()->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('empresas', function (Blueprint $table) {
            $table->dropColumn(['nombre', 'logo', 'direccion', 'telefono', 'celular', 'correo', 'link_pagina', 'link_ubicacion', 'ciudad_id']);
        });
    }
    
};
