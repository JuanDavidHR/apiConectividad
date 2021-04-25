<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('idPersona');
            $table->string('nombre', 30)->unique();
            $table->string('apellidos', 30)->unique();
            $table->integer('tipo_documento')->unsigned();
            $table->string('num_documento', 8)->unique();
            $table->string('direccion', 50)->unique();
            $table->string('telefono', 12)->unique();
            $table->string('placa', 12)->unique()->nullable();
            $table->integer('idTipo')->unsigned();
            $table->foreign('idTipo')->references('idTipo')->on('tipo');
            $table->integer('idArea')->unsigned()->nullable();
            $table->foreign('idArea')->references('idArea')->on('area');
            $table->boolean('vigencia')->default(1);
            $table->timestamps();
        });
        DB::table('personas')->insert(array('idPersona'=>1,'nombre'=>'Juan David','apellidos'=>'Huaman Rafael','tipo_documento'=>1,
        'num_documento'=>1,'direccion'=>'adasdsad','telefono'=>'123456789','idTipo'=>1,'vigencia'=>1));
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
