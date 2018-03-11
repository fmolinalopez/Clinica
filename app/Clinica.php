<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Relacion entre clinicas y usuarios, una clinica pertenece a varios usuarios.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
        return $this->belongsToMany(User::class);
    }

    /**
     * Relacion entre clinicas y citas, una clinica tinee varias citas.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function citas(){
        return $this->hasMany(Cita::class);
    }
}
