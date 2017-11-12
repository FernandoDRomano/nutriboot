<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estacion extends Model
{
    protected $table = "estacion";
    protected $fillable = ['nombre'];

    public function comidas()
    {
      return $this->hasMany('App\Comida');
    }

    //Para realizar la busqueda de estaciones 
    public function scopeSearchEstaciones($query, $nombre)
    {
      return $query->where("nombre", "LIKE", "%$nombre%");
    }

}
