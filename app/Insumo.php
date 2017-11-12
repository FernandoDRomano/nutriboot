<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table = "insumo";
    protected $fillable = ['nombre','descripcion','cantidad','fechaVencimiento', 'calorias', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function proveedores()
    {
        return $this->belongsToMany('App\Proveedores')->withTimestamps();
    }

    public function ingredientes()
    {
        return $this->hasMany('App\Ingredientes');
    }

    //Para realizar la busqueda de insumos
    public function scopeSearchInsumos($query, $nombre)
    {
      return $query->where("nombre", "LIKE", "%$nombre%");
    }

}
