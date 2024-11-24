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
        Schema::create('equipo_deportistas', function (Blueprint $table) {
            $table->foreignId('id_equipo')->references('id')->on('equipos'); 
            $table->foreignId('id_deportista')->references('id')->on('deportistas'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo_deportistas');
    }
};
