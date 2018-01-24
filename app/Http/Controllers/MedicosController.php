<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMedicoRequest;
use App\Medico;
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    public function create(){
        return view('medicos.create');
    }

    public function store(CreateMedicoRequest $request){
        Medico::create([
            'imagen'   => $request->input('imagen'),
            'nombre'    => $request->input('nombre'),
            'email'    => $request->input('email'),
            'especialidad'    => $request->input('especialidad'),
            'clinicas'    => $request->input('clinicas'),
            'num_colegiado'    => $request->input('num_colegiado'),
            'curriculum'    => $request->input('curriculum'),
            'favoritos' => 0,
            'extra' => ''
        ]);

        return redirect('/');
    }
}
