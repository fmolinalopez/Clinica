<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    /**
     * Relacion entre conversaciones y usuarios, una conversacion pertenece a varios usuarios.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    /**
     * Funcion que crea una conversacion entre dos usuarios y devuelve dicha conversacion.
     * @param User $user
     * @param User $other
     * @return mixed
     */
    public static function between(User $user, User $other){
        $query = Conversation::whereHas('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->whereHas('users', function ($query) use ($other) {
            $query->where('user_id', $other->id);
        });

        $conversation = $query->firstOrCreate([]);

        $conversation->users()->sync([$user->id, $other->id]);

        return $conversation;
    }

    /**
     * Funcion que devuelve cual de los dos usuarios de una conversacion es el medico.
     * @param $conversation
     * @return mixed
     */
    public static function obtenerMedico($conversation){
        $users = $conversation->users()->get();
        return ($users[0]->esMedico === 1 ? $users[0] : $users[1]);
    }

    /**
     * Funcion que devuelve cual de los dos usuarios de una conversacion es el paciente.
     * @param $conversation
     * @return mixed
     */
    public static function obtenerPaciente($conversation){
        $users = $conversation->users()->get();
        return ($users[0]->esMedico === 1 ? $users[1] : $users[0]);
    }

    public static function findConversationById($id){
        return Conversation::where('id', $id)->first();
    }
}
