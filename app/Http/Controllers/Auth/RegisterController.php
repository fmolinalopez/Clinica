<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if ($data['type'] === "false") {
            return Validator::make($data, [
                'name' => 'required|alpha|max:255',
                'lastName' => 'required|alpha|max:255',
                'userName' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'num_sanitario' => 'required|unique:users',
                'birthdate' => 'required|date',
                'dni' => 'string|min:9|unique:users|nullable',
                'movil' => 'required|int|digits:9|unique:users',
                'password' => 'required|string|min:6|confirmed'
            ],[
                'name.required' => 'El nombre es obligatorio.',
                'name.alpha' => 'El nombre debe ser una cadena de caracteres alfabeticos',
                'name.max' => 'El nombre debe tener 255 caracteres como máximo',
                'lastName.required' => 'El apellido es obligatorio.',
                'lastName.alpha' => 'El apellido debe ser una cadena de caracteres alfabeticos',
                'lastName.max' => 'El apellido debe tener 255 caracteres como máximo',
                'userName.required' => 'El nombre de usuario es obligatorio.',
                'userName.alpha' => 'El nombre de usuario debe ser una cadena de caracteres',
                'userName.max' => 'El nombre de ususario debe tener 255 caracteres como máximo',
                'userName.unique' => 'El nombre de ususario ya esta en uso',
                'email.required' => 'El email es obligatorio.',
                'email.string' => 'El email debe ser una cadena de caracteres',
                'email.max' => 'El email debe tener 255 caracteres como máximo',
                'email.unique' => 'El email ya existe.',
                'num_sanitario.required' => 'El numero sanitario es obligatorio.',
                'num_sanitario.unique' => 'El sanitario ya existe',
                'birthdate.required' => 'La fecha de nacimiento es obligatoria.',
                'birthdate.date' => 'Debes introducir una fecha',
                'dni.string' => 'El dni debe de ser una cadena de caracteres',
                'dni.min' => 'El dni debe tener una longitud de 9',
                'dni.unique' => 'El dni ya existe',
                'movil.required' => 'El movil es obligatorio',
                'movil.int' => 'El movil no puede incluir letras',
                'movil.digits' => 'El movil de tener 9 digitos',
                'movil.unique' => 'El movil ya existe',
                'password.required' => 'El password es obligatorio.',
                'password.string' => 'El password debe ser una cadena de caracteres',
                'password.min' => 'El password debe tener al menos 6 caracteres',
                'password.confirmed' => 'Las contraseñas no coinciden'
            ]);
        }else{
            return Validator::make($data, [
                'name' => 'required|alpha|max:255',
                'lastName' => 'required|alpha|max:255',
                'userName' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'especialidad' => 'required|alpha',
                'num_colegiado' => 'required|numeric',
                'movil' => 'required|int|digits:9|unique:users',
                'password' => 'required|string|min:6|confirmed'
            ],[
                'name.required' => 'El nombre es obligatorio.',
                'name.alpha' => 'El nombre debe ser una cadena de caracteres alfabeticos',
                'name.max' => 'El nombre debe tener 255 caracteres como máximo',
                'lastName.required' => 'El apellido es obligatorio.',
                'lastName.alpha' => 'El apellido debe ser una cadena de caracteres alfabeticos',
                'lastName.max' => 'El apellido debe tener 255 caracteres como máximo',
                'userName.required' => 'El nombre de usuario es obligatorio.',
                'userName.alpha' => 'El nombre de usuario debe ser una cadena de caracteres',
                'userName.max' => 'El nombre de ususario debe tener 255 caracteres como máximo',
                'userName.unique' => 'El nombre de ususario ya esta en uso',
                'email.required' => 'El email es obligatorio.',
                'email.string' => 'El email debe ser una cadena de caracteres',
                'email.max' => 'El email debe tener 255 caracteres como máximo',
                'email.unique' => 'El email ya existe.',
                'especialidad.required' => 'La especialidad es obligatoria.',
                'especialidad.alpha' => 'La especialidad solo puede contener caracteres alfabeticos',
                'num_colegiado.required' => 'El numero de colegiado es obligatorio.',
                'num_colegiado.numeric' => 'El numero de colegiado debe contener solo numeros',
                'movil.required' => 'El movil es obligatorio',
                'movil.int' => 'El movil no puede incluir letras',
                'movil.digits' => 'El movil de tener 9 digitos',
                'movil.unique' => 'El movil ya existe',
                'password.required' => 'El password es obligatorio.',
                'password.string' => 'El password debe ser una cadena de caracteres',
                'password.min' => 'El password debe tener al menos 6 caracteres',
                'password.confirmed' => 'Las contraseñas no coinciden'
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if ($data['type'] === "false") {
            return User::create([
                'esMedico' => 0,
                'name' => $data['name'],
                'lastName' => $data['lastName'],
                'userName' => $data['userName'],
                'email' => $data['email'],
                'num_sanitario' => $data['num_sanitario'],
                'birthdate' => $data['birthdate'],
                'dni' => $data['dni'],
                'movil' => $data['movil'],
                'avatar' => 'http://sprintresources.com/wp-content/uploads/2016/12/icon-user.png',
                'password' => bcrypt($data['password']),
            ]);
        }else{
            return User::create([
                'esMedico' => 1,
                'name' => $data['name'],
                'lastName' => $data['lastName'],
                'userName' => $data['userName'],
                'email' => $data['email'],
                'especialidad' => $data['especialidad'],
                'num_colegiado' => $data['num_colegiado'],
                'movil' => $data['movil'],
                'avatar' => 'http://sprintresources.com/wp-content/uploads/2016/12/icon-user.png',
                'password' => bcrypt($data['password']),
            ]);
        }
    }
}
