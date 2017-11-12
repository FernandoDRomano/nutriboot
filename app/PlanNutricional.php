<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanNutricional extends Model
{
    protected $table = "planNutricional";
    protected $fillable = ['fecha', 'escuela_id', 'user_id'];

    public function escuela()
    {
        return $this->belongsTo('App\Escuela');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function reporte()
    {
      return $this->hasOne('App\Reporte');
    }

    public function menusDiarios()
    {
        return $this->belongsToMany('App\MenuDiario')->withTimestamps();
    }
}
