<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = "proveedor";
    protected $fillable = ['nombre', 'escuela_id'];

    public function escuela()
    {
        return $this->belongsTo('App\Escuela');
    }

    public function insumos()
    {
        return $this->belongsToMany('App\Insumos')->withTimestamps();
    }

    //Para realizar la busqueda de los proveedores
    public function scopeSearchProveedores($query, $nombre)
    {
      return $query->where("nombre", "LIKE", "%$nombre%");
    }
}
