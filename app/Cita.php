<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Relacion entre citas y usuarios, una cita pertenece a varios usuarios.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Relacion entre citas y clinicas, una cita pertenece a una clinica
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clinica(){
        return $this->belongsTo(Clinica::class);
    }

    /**
     * Funcion que gurada una cita entre dos usuarios, en una clinica y con una fecha
     * y devuelve dicha cita.
     * @param User
     * @param User $other
     * @param $clinicaId
     * @param $fecha
     * @return mixed
     */
    public static function between(User $user, User $other, $clinicaId, $fecha)
    {
        $query = Cita::whereHas('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->whereHas('users', function ($query) use ($other) {
            $query->where('user_id', $other->id);
        });

        $citas = $query->firstOrCreate([
            'clinica_id' => $clinicaId,
            'fecha_cita' => $fecha
        ]);

        $citas->users()->sync([$user->id, $other->id]);

        return $citas;
    }

    /**
     * Funcion que devuelve cual de los dos usuarios de una cita es el medico.
     * @param $cita
     * @return mixed
     */
    public static function obtenerMedico($cita){
        $users = $cita->users()->get();
        return ($users[0]->esMedico === 1 ? $users[0] : $users[1]);
    }

    /**
     * Funcion que devuelve cual de los dos usuarios de una cita es el paciente.
     * @param $cita
     * @return mixed
     */
    public static function obtenerPaciente($cita){
        $users = $cita->users()->get();
        return ($users[0]->esMedico === 1 ? $users[1] : $users[0]);
    }
}
