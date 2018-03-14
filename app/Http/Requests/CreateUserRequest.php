<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
        $rules = array();

        $rules['name'] = $this->validarName();
        $rules['lastName'] = $this->validarName();
        $rules['userName'] = $this->validarUserName();
        $rules['email'] = $this->validarEmail();
        $rules['especialidad'] = $this->validarEspecialidad();
        $rules['num_colegiado'] = $this->validarNumColegiado();
        $rules['num_sanitario'] = $this->validarNumSanitario();
        $rules['movil'] = $this->validarMovil();
        $rules['password'] = $this->validarPassword();
        $rules['password_confirmation'] = $this->validarPasswordConfirmation();

        return $rules;
    }

    /**
     * Definición de los mensajes de validación.
     *
     * @return array
     */
    public function messages()
    {
        $mensajesName = $this->mensajesName();
        $mensajesLastName = $this->mensajesLastName();
        $mensajesUserName = $this->mensajesUserName();
        $mensajesEmail = $this->mensajesEmail();
        $mensajesEspecialidad = $this->mensajesEspecialidad();
        $mensajesNumColegiado = $this->mensajesNumColegiado();
        $mensajesNumSanitario = $this->mensajesNumSanitario();
        $mesnajesMovil = $this->mensajesMovil();
        $mesnajesPassword = $this->mensajesPassword();
        $mesnajesPasswordConfirmation = $this->mensajesPasswordConfirmation();
        $mensajes = array_merge(
            $mensajesName,
            $mensajesLastName,
            $mensajesUserName,
            $mensajesEmail,
            $mensajesEspecialidad,
            $mensajesNumColegiado,
            $mensajesNumSanitario,
            $mesnajesMovil,
            $mesnajesPassword,
            $mesnajesPasswordConfirmation
        );
        return $mensajes;
    }

    public function validarName()
    {
        return 'required|alpha';
    }

    public function validarUserName(){
        return 'required|string|max:15|unique:users';
    }

    public function validarEmail()
    {
        return 'required|email|unique:users';
    }

    public function validarEspecialidad()
    {
        return 'required|alpha';
    }

    public function validarMovil()
    {
        return 'required|numeric|int|digits:9|unique:users';
    }

    public function validarNumColegiado()
    {
        return 'required|integer|unique:users';
    }

    public function validarPassword()
    {
        return 'required|string|confirmed|min:6';
    }

    public function validarPasswordConfirmation()
    {
        return 'required|min:6';
    }

    public function mensajesName(){
        $mensajes = array();
        $mensajes['name.required'] = 'El campo Nombre es obligatorio.';
        $mensajes['name.alpha'] = 'El campo Nombre debe contener solo caracteres alfabeticos.';
        return $mensajes;
    }

    public function mensajesLastName(){
        $mensajes = array();
        $mensajes['lastName.required'] = 'El campo Apellido es obligatorio.';
        $mensajes['lastName.alpha'] = 'El campo Apellido debe contener solo caracteres alfabeticos.';
        return $mensajes;
    }

    public function mensajesUserName(){
        $mensajes = array();
        $mensajes['userName.required'] = 'El campo Nombre de usuario es obligatorio.';
        $mensajes['userName.string'] = 'El campo Nombre de usuario debe constar de una cadena de caracteres.';
        $mensajes['userName.max'] = 'No puedes introducir mas de 15 caracteres';
        $mensajes['userName.unique'] = 'Ese Nombre de usuario ya esta en uso';
        return $mensajes;
    }

    public function mensajesEmail(){
        $mensajes = array();
        $mensajes['email.required'] = 'El campo Email es obligatorio.';
        $mensajes['email.email'] = 'Introduzca un email valido.';
        $mensajes['email.unique'] = 'Ese email ya existe.';
        return $mensajes;
    }

    public function mensajesEspecialidad(){
        $mensajes = array();
        $mensajes['especialidad.required'] = 'El campo Especialidad es obligatorio';
        $mensajes['especialidad.alpha'] = 'El campo Especialidad debe contener solo caracteres alfabeticos';
        return $mensajes;
    }

    public function mensajesMovil(){
        $mensajes = array();
        $mensajes['movil.required'] = 'El campo Movil es obligatorio';
        $mensajes['movil.numeric'] = 'El campo Movil debe constar solo de numeros';
        $mensajes['movil.int'] = 'El campo Movil debe constar solo de numeros enteros';
        $mensajes['movil.digits'] = 'El campo Movil debe constar de 9 numeros';
        $mensajes['movil.unique'] = 'Ese tlf movil ya esta en uso';
        return $mensajes;
    }

    public function mensajesNumColegiado(){
        $mensajes = array();
        $mensajes['num_colegiado.required'] = 'El campo Nº de colegiado es obligatorio';
        $mensajes['num_colegiado.integer'] = 'El campo Nº de colegiado debe constar solo de numeros enteros';
        $mensajes['num_colegiado.unique'] = 'Ese Nº de colegiado ya existe';
        return $mensajes;
    }

    public function mensajesPassword(){
        $mensajes = array();
        $mensajes['password.required'] = 'El campo Contraseña es obligatorio';
        $mensajes['password.string'] = 'El campo Contraseña debe contener una cadena de caracteres';
        $mensajes['password.confirmed'] = 'Confirma la contraseña';
        $mensajes['password.min'] = 'La Contraseña debe constar de al menos 6 caracteres';
        return $mensajes;
    }

    public function mensajesPasswordConfirmation(){
        $mensajes = array();
        $mensajes['password.required'] = 'Repite la contraseña';
        $mensajes['password.min'] = 'La Contraseña debe constar de al menos 6 caracteres';
        return $mensajes;
    }

    public function validarNumSanitario()
    {
        return 'required';
    }

    public function mensajesNumSanitario()
    {
        $mensajes = array();
        $mensajes['num_sanitario.required'] = 'El campo Nº Sanitario es obligatorio';
        return $mensajes;
    }
}
