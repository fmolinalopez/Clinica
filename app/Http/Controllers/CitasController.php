<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Clinica;
use App\Http\Requests\CreateCitaRequest;
use App\Medico;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CitasController extends Controller
{
    /**
     * Funcion que devuele la vista citas.create con la variable $clinicas
     * que guarda todas las clinicas existentes
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function crearCita()
    {
        $clinicas = Clinica::all();

        return view('citas.create', [
            'clinicas' => $clinicas,
        ]);
    }

    /**
     * Funcion que devuelve la vista users.citas con la variable $citas
     * que guarda todas las citas que tiene ese usuario
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCitasUsuario()
    {
        $user = Auth::user();
        $citas = $user->citas()->latest()->paginate(10);

        return view('users.citas', [
            'user' => $user,
            'citas' => $citas,
        ]);
    }

    /**
     * Funcion que crea y guarda una cita entre dos usuarios.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $medico = User::where("id", $request->input('medico'))->first();
        $clinicaId = $request->input('clinica');
        $fecha = $request->input('horaCita');

        Cita::between($user, $medico, $clinicaId, $fecha);

        return redirect('/citas');
    }

    /**
     * Funcion que devuelve la vista citas.selectMedico con la variable $selectedClinica
     * que guarda la informacion de una clinica.
     * @param $idClinica Int Id de la clinica a buscar.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function obtenerMedicosClinica($idClinica)
    {
        if (request()->ajax()) {
            $selectedClinicaId = $idClinica;
            $selectedClinica = Clinica::where('id', $selectedClinicaId)->first();

            return View::make('citas.selectMedico', array(
                'selectedClinica' => $selectedClinica,
            ))->render();
        } else {
            return redirect('/');
        }
    }

    /**
     * Funcion que valida si la fecha recibida esta ocupada por un medico,
     * si es asi devuelve array con la string "picked",
     * sino devuelve un array vacio
     * @param Request $request
     * @return array
     */
    public function validar(Request $request)
    {
        $idMedico = $_POST['idMedico'];
        $medico = User::where('id', $idMedico)->first();
        $fecha = $_POST['fecha'];
        $checkFecha = $medico->citas()->where('fecha_cita', $fecha)->first();
        if ($fecha === "") {
            return array("noDate");
        } else {
            if ($checkFecha !== null) {
                return array("picked");
            } else {
                return array();
            }
        }
    }
}
