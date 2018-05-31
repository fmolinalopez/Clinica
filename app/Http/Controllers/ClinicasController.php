<?php

namespace App\Http\Controllers;

use App\Clinica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClinicasController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware( function($request, $next){
            $this->user = auth()->user();

            return $next($request);
        });

        $this->user = auth()->user();
    }

    /**
     * Funcion que devuelve la vista clinicas.elegirClinica con la variable $clinicas
     * que guarda todas las clinicas existentes en la bd.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function elegirClinicas(){
        $clinicas = Clinica::all();

        return view('clinicas.elegirClinica', [
            'clinicas' => $clinicas,
        ]);
    }

    /**
     * Funcion que busca la clinica con el id recibido y devuelve la vista clinicas.info
     * con los datos de dicha clinica.
     * @param $clinicaId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function info($clinicaId){
        $clinica = Clinica::find($clinicaId);

        return view('clinicas.info', [
            'clinica' => $clinica,
        ]);
    }

    /**
     * Funcion que asigna las clinicas recibidas al usuario logeado.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function sincronizarClinicas(Request $request){
        $user = $this->user;
        $clincas = $request->input('clinicas');

        $user->clinicas()->sync($clincas);

        return redirect('/');
    }
}
