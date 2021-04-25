<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{

    protected $table = 'tipo';
    protected $primaryKey = 'idTipo';
    protected $fillable = ['nombre', 'descripcion', 'vigencia'];
    public $timestamps = false;
    public function users(){
        return $this->hasMany('App\Models\Persona');
    }

}