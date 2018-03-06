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
        $medico = Medico::where("id", $request->input('medico'))->first();
        $fecha =  $request->input('horaCita');

        $cita = Cita::create([
            'medico_id' => $medico->id,
            'user_id' => $user->id,
            'fecha_cita' => $fecha,
        ]);

        return redirect('/citas');
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

    public function validar(){
        $idMedico = $_POST['idMedico'];
        $medico = Medico::where('id', $idMedico)->first();
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
