<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "categoria";
    protected $fillable = ['nombre'];

    public function insumos()
    {
      return $this->hasMany('App\Insumo');
    }

    //Para realizar la busqueda de categorias 
    public function scopeSearchCategorias($query, $nombre)
    {
      return $query->where("nombre", "LIKE", "%$nombre%");
    }

}
