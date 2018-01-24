<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicosController extends Controller
{
    public function create(){
        return view('medicos.create');
    }
}
