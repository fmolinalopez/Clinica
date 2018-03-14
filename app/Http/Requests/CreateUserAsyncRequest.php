<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CreateUserAsyncRequest extends CreateUserRequest
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

        if($this->exists('name')){
            $rules['name'] = $this->validarName();
        }

        if($this->exists('lastName')) {
            $rules['lastName'] = $this->validarName();
        }

        if($this->exists('userName')) {
            $rules['userName'] = $this->validarUserName();
        }

        if($this->exists('email')) {
            $rules['email'] = $this->validarEmail();
        }

        if($this->exists('especialidad')) {
            $rules['especialidad'] = $this->validarEspecialidad();
        }

        if($this->exists('movil')) {
            $rules['movil'] = $this->validarMovil();
        }

        if($this->exists('num_colegiado')) {
            $rules['num_colegiado'] = $this->validarNumColegiado();
        }

        if($this->exists('num_sanitario')) {
            $rules['num_sanitario'] = $this->validarNumSanitario();
        }

        if($this->exists('birthdate')) {
            $rules['birthdate'] = $this->validarBirthdate();
        }

        if($this->exists('dni')) {
            $rules['dni'] = $this->validarDnidni();
        }

        if($this->exists('password')) {
            $rules['password'] = $this->validarPassword();
        }

        if($this->exists('password_confirmation')) {
            $rules['password_confirmation'] = $this->validarPasswordConfirmation();
        }

        return $rules;
    }

    protected function failedValidation($validator)
    {
        $errors = $validator->errors();
        $response = new JsonResponse([
            'name' => $errors->get('name'),
            'lastName' => $errors->get('lastName'),
            'userName' => $errors->get('userName'),
            'email' => $errors->get('email'),
            'especialidad' => $errors->get('especialidad'),
            'movil' => $errors->get('movil'),
            'num_colegiado' => $errors->get('num_colegiado'),
            'num_sanitario' => $errors->get('num_sanitario'),
            'birthdate' => $errors->get('birthdate'),
            'dni' => $errors->get('dni'),
            'password' => $errors->get('password'),
            'password_confirmation' => $errors->get('password_confirmation')
        ]);

        throw new ValidationException($validator, $response);
    }
}
