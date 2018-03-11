<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    /**
     * Relacion entre mensajes y usuarios, un mensaje pertenece a un usuario.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function converstaion(){
        return $this->belongsTo(Conversation::class);
    }

    public static function obtenerNombreUsuario($id){
        return User::find($id);
    }
}
