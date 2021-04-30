<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLugarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Lugar', function (Blueprint $table) {
            $table->increments('idLugar');
            $table->string('direccion', 50);
            $table->string('referencia', 150);
            $table->string('latitud', 50)->unique();
            $table->string('longitud', 50)->unique();
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
        Schema::dropIfExists('Lugar');
    }
}
