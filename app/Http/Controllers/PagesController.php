<?php

namespace App\Http\Controllers;

use App\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class PagesController extends Controller
{
    public function home(){
        $user = Auth::user();

        return view('home', [
            'user' => $user,
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
