<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Clinica;
use App\Medico;
use App\User;
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

    public function showCitasUsuario()
    {
        $user = Auth::user();
        $citas = $user->citas()->latest()->paginate(10);

        return view('users.citas', [
            'citas' => $citas,
        ]);
    }

    public function store(Request $request){
        $user = Auth::user();
        $medico = User::where("id", $request->input('medico'))->first();
        $clinicaId = $request->input('clinica');
        $fecha =  $request->input('horaCita');

        Cita::between($user, $medico, $clinicaId, $fecha);

        return redirect('/');
    }

    public function obtenerMedicosClinica($idClinica){
        if (request()->ajax()){
            $selectedClinicaId = $idClinica;
            $selectedClinica = Clinica::where('id', $selectedClinicaId)->first();

            return View::make('citas.selectMedico', array(
                'selectedClinica' => $selectedClinica,
            ))->render();
        }else {
            return redirect('/');
        }
    }

    public function validar(Request $request){
        $idMedico = $_POST['idMedico'];
        $medico = User::where('id', $idMedico)->first();
        $fecha = $_POST['fecha'];
        $checkFecha = $medico->citas()->where('fecha_cita', $fecha)->first();
        if ($fecha === ""){
            return array("noDate");
        }else{
            if ( $checkFecha !== null) {
                return array("picked");
            } else {
                return array();
            }
        }
    }
}
