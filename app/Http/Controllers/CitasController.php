<?php

namespace App\Http\Controllers;

use App\Clinica;
use App\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CitasController extends Controller
{
    public function crearCita(){
        $user = Auth::user();
        $clinicas = Clinica::all();

        return view('citas.create', [
            'user' => $user,
            'clinicas' => $clinicas,
        ]);
    }

    public function obtenerMedicosClinica($idClinica){
        if (request()->ajax()){
            $user = Auth::user();
            $clinicas = Clinica::all();
            $clinica = Clinica::where('id', $idClinica);
//            $medicos = $clinica->medicos();

            return View::make('citas.create', array(
                'user' => $user,
                'clinica' => $clinica,
                'clinicas' => $clinicas,
//                'medicos' => $medicos,
            ))->render();
        }else {
            return redirect('/');
        }
    }
}
