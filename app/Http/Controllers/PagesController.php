<?php

namespace App\Http\Controllers;

use App\Medico;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        $medicos = Medico::orderBy('created_at', 'desc')->paginate(10);

        return view('home', [
            'medicos' => $medicos,
        ]);
    }
}
