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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'userName' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'num_sanitario' => 'required|digits:11|unique:users',
            'birthdate' => 'required|date',
            'dni' => 'string|min:9|unique:users',
            'movil' => 'required|int|digits:9|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'lastName' => $data['lastName'],
            'userName' => $data['userName'],
            'email' => $data['email'],
            'num_sanitario' => $data['num_sanitario'],
            'birthdate' => $data['birthdate'],
            'dni' => $data['dni'],
            'movil' => $data['movil'],
            'avatar' => 'https://instrumentalfx.co/wp-content/uploads/2018/01/Uganda-Knuckles-300x300.jpg',
            'password' => bcrypt($data['password']),
        ]);
    }
}
