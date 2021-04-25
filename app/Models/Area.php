<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

    protected $table = 'area';
    protected $primaryKey = 'idArea';
    protected $fillable = ['nombre', 'descripcion', 'vigencia'];
    public $timestamps = false;
    public function users(){
        return $this->hasMany('App\Models\Persona');
    }

}