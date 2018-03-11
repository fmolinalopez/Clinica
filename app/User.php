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

    /**
     * Relacion entre citas y usuarios, un usuario pertenece a varias citas
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function citas()
    {
        return $this->belongsToMany(Cita::class);
    }

    /**
     * Relacion entre clinicas y usuarios, un usuario pertenece a varias clinicas.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function clinicas()
    {
        return $this->belongsToMany(Clinica::class);
    }

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class);
    }

    public static function findUserByUserName($userName)
    {
        return User::where('userName', $userName)->first();
    }

    public static function findUserByName($name){
        return User::where('name', $name)->first();
    }


}
