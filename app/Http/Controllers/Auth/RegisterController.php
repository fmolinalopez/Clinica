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
                'num_sanitario' => 'required',
                'birthdate' => 'required|date',
                'dni' => 'string|min:9|unique:users|nullable',
                'movil' => 'required|int|digits:9|unique:users',
                'password' => 'required|string|min:6|confirmed'
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
