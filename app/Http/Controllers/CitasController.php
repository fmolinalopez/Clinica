<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Clinica;
use App\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CitasController extends Controller
{
    public function crearCita(){
        $clinicas = Clinica::all();

        return view('citas.create', [
            'clinicas' => $clinicas,
        ]);
    }

    public function store(Request $request){
        $user = Auth::user();
        $medico = Medico::where("id", 1)->first();
        $fecha =  $request->input('horaCita');

        $cita = Cita::create([
            'medico_id' => $medico->id,
            'user_id' => $user->id,
            'fecha_cita' => $fecha,
        ]);

        return redirect('/');
    }

    public function obtenerMedicosClinica($idClinica){
        if (request()->ajax()){
            $clinicas = Clinica::all();
            $selectedClinicaId = $idClinica;
            $selectedClinica = Clinica::where('id', $selectedClinicaId)->first();

            return View::make('citas.create', array(
                'clinicas' => $clinicas,
                'selectedClinica' => $selectedClinica,
            ))->render();
        }else {
            return redirect('/');
        }
    }

    public function validar(){
        $idMedico = $_POST['idMedico'];
        $medico = Medico::where('id', $idMedico)->first();
        $fecha = $_POST['fecha'];
        $checkFecha = $medico->citas()->where('fecha_cita', $fecha)->first();
        if ( $checkFecha !== null ) {
            return array("picked");
        } else {
            return array();

        }
    }

//    public function obtenerCitasMedico($idMedico, Request $request){
//        if (request()->ajax()){
//            $clinicas = Clinica::all();
//            $selectedClinicaId = $request->input(['clinica']);
//            $selectedClinica = Clinica::where('id', $selectedClinicaId)->first();
//            $selectedMedicoId = $idMedico;
//            $selectedMedico = Clinica::where('id', $selectedMedicoId)->first();
//
//            return View::make('citas.create', array(
//                'clinicas' => $clinicas,
//                'selectedClinica' => $selectedClinica,
//                'selectedMedico' => $selectedMedico,
//            ))->render();
//        }else {
//            return redirect('/');
//        }
//    }
}
