<?php

namespace App\Policies;

use App\Cita;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CitasPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, Cita $cita)
    {
        return $cita->users()->get()->contains($user);
    }
}
