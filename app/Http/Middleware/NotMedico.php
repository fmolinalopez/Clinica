<?php

namespace App\Http\Middleware;

use Closure;

class notMedico
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->esMedico){
            return redirect('/')->with('error', 'Solo los pacientes pueden pedir cita');
        }

        return $next($request);
    }
}
