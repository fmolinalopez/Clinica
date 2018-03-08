<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class ProfilesController extends Controller
{
    public function profile(Request $request)
    {
        $user = $request->user();

        return view('profiles.profile', [
            'user' => $user
        ]);
    }

    public function edit(Request $request)
    {
        $user = Auth::user();

        return view('profiles.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $route = $request->input('route');
        $user = User::findOrFail(Auth::user()->id);
        $data = array_filter($request->all());

        switch ($route) {
            case 'personal':
                $user->fill($data);
                break;
            case 'account':
                if (isset($data['userName'])) {
                    $user->userName = $data['userName'];
                }
                if (isset($data['email'])){
                    $user->email = $data['email'];
                }
                if (array_key_exists("current_password", $data)) {
                    if (!Hash::check($data['current_password'], Auth::user()->password)) {
                        return redirect()->back()->with('error', 'La constraseña actual no es correcta');
                    }
                    if (strcmp($data['current_password'], $request->get('password')) == 0) {
                        return redirect()->back()->with('error', 'La nueva contraseña debe ser diferente de la antigua.');
                    }
                    $user->password = bcrypt($data['password']);
                }
            case 'avatar':
                break;
            case 'additional':
                if (isset($data['website'])) {
                    $user->website = $data['website'];
                }
                if (isset($data['about'])){
                    $user->about = $data['about'];
                }
                break;
        }

        $user->save();
        return redirect()
            ->route('profile.edit')
            ->with('exito', 'Datos actualizados');

    }

    public function datosPersonales()
    {
        if (request()->ajax()) {
            return View::make('profiles.partials.personal', ['user' => Auth::user()])->render();
        } else {
            return redirect('/');
        }
    }

    public function datosCuenta()
    {
        if (request()->ajax()) {
            return View::make('profiles.partials.account', ['user' => Auth::user()])->render();
        } else {
            return redirect('/');
        }
    }

    public function datosAvatar()
    {
        if (request()->ajax()) {
            return View::make('profiles.partials.avatar', ['user' => Auth::user()])->render();
        } else {
            return redirect('/');
        }
    }

    public function datosAdicionales()
    {
        if (request()->ajax()) {
            return View::make('profiles.partials.additional', ['user' => Auth::user()])->render();
        } else {
            return redirect('/');
        }
    }
}
