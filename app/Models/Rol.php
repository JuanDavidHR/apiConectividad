<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{

    protected $table = 'rol';
    protected $primaryKey = 'idRol';
    protected $fillable = ['nombre', 'descripcion', 'vigencia'];
    public $timestamps = false;
    public function users(){
        return $this->hasMany('App\Models\User');
    }

}