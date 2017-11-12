<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = "alumno";
    protected $fillable = ['nombre', 'dni', 'direccion', 'fechaNacimiento', 'nombreTutor', 'escuela_id'];

    public function escuela()
    {
        return $this->belongsTo('App\Escuela');
    }

    public function registros()
    {
      return $this->hasMany('App\Registro');
    }

    //Para realizar la busqueda de alumnos
    public function scopeSearchAlumnos($query, $nombre)
    {
      return $query->where("nombre", "LIKE", "%$nombre%");
    }

}
