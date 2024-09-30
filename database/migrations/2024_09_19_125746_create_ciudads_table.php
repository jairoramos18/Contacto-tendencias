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
                $table->bigInteger('departamento_id')->unsigned();
                $table->string('nombre');
                $table->string('estado');
                $table->string('registradopor');
                $table->timestamps();
                
                $table->foreign('departamento_id')
                    ->references('id')
                    ->on('departamentos');
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
