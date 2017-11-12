<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $table = "ingrediente";
    protected $fillable = ['cantidad', 'unidad', 'comida_id', 'insumo_id'];

    public function comida()
    {
        return $this->belongsTo('App\Comida');
    }

    public function insumo()
    {
        return $this->belongsTo('App\Insumo');
    }
}
