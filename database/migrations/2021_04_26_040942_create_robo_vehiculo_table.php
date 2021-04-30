<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoboVehiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roboVehiculo', function (Blueprint $table) {
            $table->increments('idRoboVehiculo');
            $table->string('nombrePropietario', 30);
            $table->string('apellidoPropietario', 30);
            $table->integer('tipo_documento_propietario')->unsigned();
            $table->string('num_documento_propietario',8)->unique();
            $table->string('colorVehiculo', 50);
            $table->string('marcaVehiculo', 50);
            $table->string('modeloVehiculo', 50);
            $table->string('placaRodaje', 10)->unique();
            $table->string('numMotor', 10)->unique();
            $table->text('hechos');            
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
        Schema::dropIfExists('roboVehiculo');
    }
}
