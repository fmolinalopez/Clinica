<?php

namespace App\Http\Controllers;

use App\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PagesController extends Controller
{
    public function home(){
        $medicos = Medico::orderBy('created_at', 'desc')->paginate(10);

//        $medicos = Medico::with('clinica')->get();

        return view('home', [
            'medicos' => $medicos,
        ]);
    }

    public function obtenerPaginaMedicos(){
        if (request()->ajax()){
            $medicos = Medico::orderBy('created_at', 'desc')->paginate(10);
            return View::make('medicos.lista', array('medicos' => $medicos))->render();
        }else{
            return redirect('/');
        }
    }
}
