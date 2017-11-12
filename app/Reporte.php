<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $table = "reporte";
    protected $fillable = ['fecha', 'planNutricional_id'];

    public function planNutricional()
    {
      return $this->belongsTo('App\PlanNutricional');
    }
}
