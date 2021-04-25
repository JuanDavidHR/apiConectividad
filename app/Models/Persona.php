<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    protected $primaryKey = 'idPersona';
    protected $fillable = ['nombre','apellidos','tipo_documento','num_documento','direccion','telefono','idTipo','idArea','placa','vigencia'];

    public function user(){
        return $this->hasOne('app\User');
    }
}