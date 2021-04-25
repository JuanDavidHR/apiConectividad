<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('idUsuario');
            $table->string('email')->unique()->notNullable();
            $table->string('password');
            $table->integer('idRol')->unsigned();
            $table->foreign('idRol')->references('idRol')->on('rol');
            $table->integer('idPersona')->unsigned();
            $table->foreign('idPersona')->references('idPersona')->on('personas');
            $table->boolean('vigencia')->default(1);
            $table->timestamps();
        });
        DB::table('users')->insert(array('idUsuario'=>1,
        'email'=>'admin@admin.com', 'password' =>'$2y$10$k1z5uamav.Bl4BPV4HxdMe1.9sH1W3COwTJ0sutDJHBez9gPiSbb.', 'idRol'=>1,'idPersona'=>1, 'vigencia'=>1));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
