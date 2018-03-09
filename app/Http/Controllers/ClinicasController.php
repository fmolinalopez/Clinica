<?php

namespace App\Http\Controllers;

use App\Clinica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClinicasController extends Controller
{
    public function elegirClinicas(){
        $clinicas = Clinica::all();

        return view('clinicas.elegirClinica', [
            'clinicas' => $clinicas
        ]);
    }

    public function info($clinicaId){
        $clinica = Clinica::find($clinicaId);

        return view('clinicas.info', [
            'clinica' => $clinica,
        ]);
    }

    public function sincronizarClinicas(Request $request){
        $user = Auth::user();
        $clincas = $request->input('clinicas');

        $user->clinicas()->sync($clincas);

        return redirect('/');
    }
}
