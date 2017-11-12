<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = "registro";
    protected $fillable = ['fecha', 'peso', 'altura', 'imc', 'alumno_id'];

    public function alumno()
    {
        return $this->belongsTo('App\Alumno');
    }
}
