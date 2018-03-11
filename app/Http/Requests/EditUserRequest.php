<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|alpha|max:255',
            'lastName' => 'required|alpha|max:255',
            'userName' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'num_sanitario' => 'required|unique:users',
            'birthdate' => 'required|date',
            'dni' => 'string|min:9|unique:users|nullable',
            'avatar' => 'url',
            'movil' => 'required|int|digits:9|unique:users',
            'especialidad' => 'required|alpha',
            'num_colegiado' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
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
            'avatar.url' => 'El campo avatar tiene que ser una url a la foto que desees',
            'especialidad.required' => 'La especialidad es obligatoria.',
            'especialidad.alpha' => 'La especialidad solo puede contener caracteres alfabeticos',
            'num_colegiado.required' => 'El numero de colegiado es obligatorio.',
            'num_colegiado.numeric' => 'El numero de colegiado debe contener solo numeros',
            'password.required' => 'El password es obligatorio.',
            'password.string' => 'El password debe ser una cadena de caracteres',
            'password.min' => 'El password debe tener al menos 6 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden'
        ];
    }
}
