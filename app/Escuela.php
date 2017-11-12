<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $table = "escuela";
    protected $fillable = ['nombre', 'direccion', 'telefono'];

    public function users()
    {
      return $this->hasMany('App\User');
    }

    //Para realizar la busqueda de escuelas 
    public function scopeSearch($query, $nombre)
    {
      return $query->where("nombre", "LIKE", "%$nombre%");
    }
}
