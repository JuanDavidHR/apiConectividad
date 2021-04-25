<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo', function (Blueprint $table) {
            $table->increments('idTipo');
            $table->string('nombre', 30)->unique();
            $table->string('descripcion', 100)->nullable();
            $table->boolean('vigencia')->default(1);
            $table->timestamps();
        });
        DB::table('tipo')->insert(array('idTipo'=>'1', 'nombre'=>'Persona Comun', 'descripcion' =>'Persona Comun.'));
        DB::table('tipo')->insert(array('idTipo'=>'2', 'nombre'=>'Policia', 'descripcion' =>'Policia xd.'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo');
    }
}
