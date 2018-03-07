<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ProfilesController extends Controller
{
    public function profile(Request $request){
        $user = $request->user();

        return view('profiles.profile', [
            'user' => $user
        ]);
    }

    public function edit(Request $request){
        $user = Auth::user();

        return view('profiles.edit', [
            'user' => $user
        ]);
    }

    public function asd(){
        if (request()->ajax()){
            return View::make('profiles.partials.personal')->render();
        }else {
            return redirect('/');
        }
    }

    public function datosCuenta(){
        if (request()->ajax()){
            return View::make('profiles.partials.account')->render();
        }else {
            return redirect('/');
        }
    }

    public function datosAvatar(){
        if (request()->ajax()){
            return View::make('profiles.partials.avatar')->render();
        }else {
            return redirect('/');
        }
    }

    public function datosAdicionales(){
        if (request()->ajax()){
            return View::make('profiles.partials.additional')->render();
        }else {
            return redirect('/');
        }
    }
}
