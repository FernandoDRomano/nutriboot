<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";
    protected $fillable = [
        'nombre', 'direccion', 'dni', 'cargo', 'email',
        'nombreUsuario', 'password', 'perfil_id', 'escuela_id'
    ];

    /**
     * The attributes that should be hidden for arrays.id
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function escuela()
    {
        return $this->belongsTo('App\Escuela');
    }

    public function perfil()
    {
        return $this->belongsTo('App\Perfil');
    }

    //Para realizar la busqueda de usuarios
    public function scopeSearchUsers($query, $nombre)
    {
      return $query->where("nombre", "LIKE", "%$nombre%");
    }

}
