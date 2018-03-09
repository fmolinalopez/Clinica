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
    protected $fillable = [
        'esMedico', 'name', 'lastName', 'userName', 'email', 'num_sanitario', 'birthdate', 'dni', 'movil', 'avatar', 'especialidad', 'num_colegiado', 'curriculum', 'favoritos', 'destacado', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    public function medicos(){
//        return $this->hasMany(Medico::class);
//    }

    public function citas(){
        return $this->hasMany(Cita::class);
    }
}
