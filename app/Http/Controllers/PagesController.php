<?php

namespace App\Http\Controllers;

use App\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class PagesController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->middleware( function($request, $next){
            $this->user = auth()->user();

            return $next($request);
        });

        $this->user = auth()->user();
    }

    /**
     * Funcion que devuelve la vusta home con los datos del usuario logeado.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home(){
        $user = $this->user;

        return view('home', [
            'user' => $user,
        ]);
    }

//    /**
//     * Funcion que devuelve una vista con los datos de los siguientes
//     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
//     */
//    public function obtenerPaginaMedicos(){
//        if (request()->ajax()){
//            $medicos = Medico::orderBy('created_at', 'desc')->paginate(10);
//            return View::make('medicos.lista', array('medicos' => $medicos))->render();
//        }else{
//            return redirect('/');
//        }
//    }
}
