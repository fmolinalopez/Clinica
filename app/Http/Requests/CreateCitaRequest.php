<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCitaRequest extends FormRequest
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

        $rules['fecha'] = $this->validarFecha();

        return $rules;
    }

    public function messages()
    {
        $mensajesFecha = $this->mensajesFecha();

        return $mensajesFecha;
    }

    protected function validarFecha()
    {
        return 'required';
    }

    protected function mensajesFecha()
    {
        $mensajes = array();
        $mensajes["fecha.required"] = 'Selecciona una fecha por favor';
        return $mensajes;
    }
}
