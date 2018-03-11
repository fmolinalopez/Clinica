<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class ProfilesController extends Controller
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
     * Funcion que devuleve la vista profile con los datos del usuario logeado.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile(Request $request)
    {
        $user = $request->user();

        return view('profiles.profile', [
            'user' => $user
        ]);
    }

    /**
     * Funcion que devuelve la vista profiles.edit del usuario logeado.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $user = $this->user;

        return view('profiles.edit', [
            'user' => $user
        ]);
    }

    /**
     * Funcion que actualiza los datos del usuario logeado
     * en funcion de la ruta recibida.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $route = $request->input('route');
        $user = User::findOrFail($this->user->id);
        $data = array_filter($request->all());

        switch ($route) {
            case 'personal':
                if (isset($data['dni'])) {
                    if (User::where('dni', $data['dni']) != null) {
                        return redirect()->back()->with('error', 'El dni introducido ya existe');
                    }
                }
                if (isset($data['movil'])) {
                    if (User::where('movil', $data['movil']) != null) {
                        return redirect()->back()->with('error', 'El movil introducido ya existe');
                    }
                }
                $user->fill($data);
                break;
            case 'account':
                if (isset($data['userName'])) {
                    if (User::where('userName', $data['userName']) != null) {
                        return redirect()->back()->with('error', 'El nombre de usuario introducido ya existe');
                    }
                    $user->userName = $data['userName'];
                }
                if (isset($data['email'])) {
                    if (User::where('email', $data['email']) != null) {
                        return redirect()->back()->with('error', 'El email introducido ya existe');
                    }
                    $user->email = $data['email'];
                }
                if (array_key_exists("current_password", $data)) {
                    if (!Hash::check($data['current_password'], $this->user->password)) {
                        return redirect()->back()->with('error', 'La constraseña actual no es correcta');
                    }
                    if (strcmp($data['current_password'], $request->get('password')) == 0) {
                        return redirect()->back()->with('error', 'La nueva contraseña debe ser diferente de la antigua.');
                    }
                    $user->password = bcrypt($data['password']);
                }
            case 'avatar':
                $user->avatar = $data['avatar'];
                break;
            case 'additional':
                if (isset($data['website'])) {
                    $user->website = $data['website'];
                }
                if (isset($data['about'])) {
                    $user->about = $data['about'];
                }
                break;
        }

        $user->save();
        return redirect()
            ->route('profile.edit')
            ->with('exito', 'Perfil actualizado');

    }

    /**
     * Funcion que devuelve la vista profiles.partials.personal para su carga asincrona
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function datosPersonales()
    {
        if (request()->ajax()) {
            return View::make('profiles.partials.personal', ['user' => $this->user])->render();
        } else {
            return redirect('/');
        }
    }

    /**
     * Funcion que devuelve la vista profiles.partials.account para su carga asincrona
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function datosCuenta()
    {
        if (request()->ajax()) {
            return View::make('profiles.partials.account', ['user' => $this->user])->render();
        } else {
            return redirect('/');
        }
    }

    /**
     * Funcion que devuelve la vista profiles.partials.avatar para su carga asincrona
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function datosAvatar()
    {
        if (request()->ajax()) {
            return View::make('profiles.partials.avatar', ['user' => $this->user])->render();
        } else {
            return redirect('/');
        }
    }

    /**
     * Funcion que devuelve la vista profiles.partials.additional para su carga asincrona
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function datosAdicionales()
    {
        if (request()->ajax()) {
            return View::make('profiles.partials.additional', ['user' => $this->user])->render();
        } else {
            return redirect('/');
        }
    }

    public function destroy(){
        $this->user->delete();

        return redirect('/');
    }
}
