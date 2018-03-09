<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function citas(){
        return $this->hasMany(Cita::class);
    }
}
