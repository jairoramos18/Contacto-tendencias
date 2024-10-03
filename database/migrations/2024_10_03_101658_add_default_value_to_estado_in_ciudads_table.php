<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
        public function up(): void
        {
            Schema::table('ciudads', function (Blueprint $table) {
                $table->string('estado')->default('activo')->change(); // Cambia a 'activo'
            });
        }
    
        public function down(): void
        {
            Schema::table('ciudads', function (Blueprint $table) {
                $table->dropColumn('estado'); // Esto podría variar según tu necesidad
            });
        }
    
};
