<?php

namespace App\Http\Controllers;

use App\Clinica;
use App\Http\Requests\CreateMedicoRequest;
use App\Medico;
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    public function create(){
        $clinicas = Clinica::all();

        return view('medicos.create', [
            'clinicas' => $clinicas,
        ]);
    }

    public function clinicas($nombreMedico){

        $medico = Medico::where('nombre', $nombreMedico)->first();

        return view('medicos.clinicas', [
            'medico' => $medico,
        ]);
    }

    public function store(CreateMedicoRequest $request){

        $user = $request->user();
        $clinicasId = $request->input('clinica');
        $clinicas = Clinica::wherein("id", $clinicasId)->get();

        $medico = Medico::create([
            'user_id' => $user->id,
            'imagen'   => $request->input('imagen'),
            'nombre'    => $request->input('nombre'),
            'email'    => $request->input('email'),
            'especialidad'    => $request->input('especialidad'),
            'num_colegiado'    => $request->input('num_colegiado'),
            'curriculum'    => $request->input('curriculum'),
            'favoritos' => 0,
            'destacado' => false,
            'extra' => ''
        ]);

        $medico->clinicas()->sync($clinicas);

        return redirect('/');
    }
}
