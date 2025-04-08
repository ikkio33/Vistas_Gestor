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
        Schema::table('mesones', function (Blueprint $table) {
            $table->string('estado')->default('disponible'); // Estado predeterminado
        });
    }
    
    public function down()
    {
        Schema::table('mesones', function (Blueprint $table) {
            $table->dropColumn('estado');
        });
    }
    
};
