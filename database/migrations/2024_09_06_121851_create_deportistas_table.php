<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { //cree tabla deportista
        //$table->foreignId('pais')->references('id')->on('pais'); // Foreign key

        Schema::create('deportistas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('pais')->references('id')->on('pais'); // Foreign key
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deportistas');
    }
};
