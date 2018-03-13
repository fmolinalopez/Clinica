<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class MessageRequest extends FormRequest
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

        $rules['content'] = $this->validarContent();

        return $rules;
    }

    /**
     * Definición de los mensajes de validación.
     *
     * @return array
     */
    public function messages()
    {
        $mensajesContent = $this->mensajesContent();

        $mensajes = array_merge(
            $mensajesContent
        );
        return $mensajes;
    }

    public function validarContent()
    {
        return 'required|string|max:100';
    }

    public function mensajesContent(){
        $mensajes = array();
        $mensajes['content.required'] = 'Tienes que escribir un mensaje!';
        $mensajes['content.string'] = 'El mensaje tiene que ser una cadena de caracteres';
        $mensajes['content.max'] = 'El mensaje no puede tener mas de 100 caracteres.';
        return $mensajes;
    }
}
