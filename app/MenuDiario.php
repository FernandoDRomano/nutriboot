<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuDiario extends Model
{
    protected $table = "menuDiario";
    protected $fillable = ['nombre', 'descripcion'];

    public function planesNutricionales()
    {
        return $this->belongsToMany('App\PlanNutricional')->withTimestamps();
    }

    public function comidas()
    {
      return $this->hasMany('App\Comida');
    }
}
