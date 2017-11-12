<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comida extends Model
{
    protected $table = "comida";
    protected $fillable = ['nombre', 'descripcion', 'caloriasComida', 'estacion_id', 'tipoComida_id', 'menuDiario_id'];

    public function menuDiario()
    {
        return $this->belongsTo('App\MenuDiario');
    }

    public function estacion()
    {
        return $this->belongsTo('App\Estacion');
    }

    public function tipoComida()
    {
        return $this->belongsTo('App\TipoComida');
    }

    public function comidas()
    {
      return $this->hasMany('App\Ingrediente');
    }
}
