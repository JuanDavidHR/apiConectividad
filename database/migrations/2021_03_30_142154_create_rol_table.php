<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol', function (Blueprint $table) {
            $table->increments('idRol');
            $table->string('nombre', 30)->unique();
            $table->string('descripcion', 100)->nullable();
            $table->boolean('vigencia')->default(1);
            $table->timestamps();
        });
        DB::table('rol')->insert(array('idRol'=>'1', 'nombre'=>'Administrador del sistema', 'descripcion' =>'Administradores del Sistema Web.'));
        DB::table('rol')->insert(array('idRol'=>'2', 'nombre'=>'Policia', 'descripcion' =>'Procesas los Reportes '));
        DB::table('rol')->insert(array('idRol'=>'3', 'nombre'=>'Denunciante', 'descripcion' =>'Registra denuncias.'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol');
    }
}
