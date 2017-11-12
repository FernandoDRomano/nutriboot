<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoComida extends Model
{
    protected $table = "tipoComida";
    protected $fillable = ['nombre'];

    public function comidas()
    {
      return $this->hasMany('App\Comida');
    }

    //Para realizar la busqueda de Tipos de Comida 
    public function scopeSearchTipoComida($query, $nombre)
    {
      return $query->where("nombre", "LIKE", "%$nombre%");
    }

}
