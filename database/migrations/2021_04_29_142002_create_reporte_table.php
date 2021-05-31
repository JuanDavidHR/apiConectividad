<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Reporte', function (Blueprint $table) {
            $table->increments('idReporte');
            $table->integer('idTipoReporte')->unsigned();
            $table->foreign('idTipoReporte')->references('idTipoReporte')->on('tipo');
            $table->integer('idArea')->unsigned()->nullable();
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
        Schema::dropIfExists('Reporte');
    }
}
