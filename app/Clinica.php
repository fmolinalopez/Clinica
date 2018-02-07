<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function medicos(){
        return $this->belongsToMany(Medico::class);
    }
}
