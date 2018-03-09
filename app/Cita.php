<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function clinica(){
        return $this->belongsTo(Clinica::class);
    }

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

    public static function obtenerMedico($cita){
        $users = $cita->users()->get();
        return ($users[0]->esMedico === 1 ? $users[0] : $users[1]);
    }
}
