<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{

 protected $table = 'categories';
 protected $primaryKey = 'CategoryID';
 protected $fillable = ['CategoryID','CategoryName','Description'];
 protected $hidden = ['created_at','updated_at','Picture'];

}