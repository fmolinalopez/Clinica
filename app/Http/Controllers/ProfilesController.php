<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
