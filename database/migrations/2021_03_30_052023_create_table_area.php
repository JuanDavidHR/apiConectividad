<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableArea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area', function (Blueprint $table) {
            $table->increments('idArea');
            $table->string('nombre', 30)->unique();
            $table->string('descripcion', 100)->nullable();
            $table->boolean('vigencia')->default(1);
            $table->timestamps();
        });
        DB::table('area')->insert(array('idArea'=>'1', 'nombre'=>'Transito', 'descripcion' =>'Todo lo referente a transito.'));
        DB::table('area')->insert(array('idArea'=>'2', 'nombre'=>'Familia', 'descripcion' =>'Todo lo referente a Familia.'));
        DB::table('area')->insert(array('idArea'=>'3', 'nombre'=>'Delitos', 'descripcion' =>'Todo lo referente a delitos.'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area');
    }
}
