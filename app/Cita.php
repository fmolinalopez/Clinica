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

    public function clinicas(){
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
}
