<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMedicoRequest extends FormRequest
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
            'imagen' => [
                'required',
            ],
            'nombre' => [
                'required', 'string'
            ],
            'email' => [
                'required', 'unique:medicos'
            ],
            'especialidad' => [
                'required', 'max:255', 'string'
            ],
//            'clinicas' => [
//                'required'
//            ],
            'num_colegiado' => [
                'required', 'integer', 'unique:medicos'
            ],
            'curriculum' => [
                'required', 'string'
            ],

        ];
    }

    /**
     * Definición de los mensajes de validación.
     *
     * @return array
     */
    public function messages()
    {
        // Se espeficican los mensajes de validación para las reglas definidas
        // en el método rules de esta clase.
        return [
            'imagen.required' => 'El campo Imagen es obligatorio',
            'nombre.required' => 'El campo Nombre es obligatorio',
            'nombre.string' => 'El campo Nombre debe de ser una cadena de caracteres',
            'email.required' => 'El campo Email es obligatorio',
            'email.unique' => 'Ese email ya existe',
//            'email.unique' => 'El email ya esta en uso',
            'especialidad.required' => 'El campo Especialidad es obligatorio',
            'especialidad.max:255' => 'El campo Especialidad no puede contener mas de 255 caracteres',
            'especialidad.string' => 'El campo Especialidad debe de ser una cadena de caracteres',
//            'clinicas.required' => 'El campo Clinicas es obligatorio',
            'num_colegiado.required' => 'El campo Nº de colegiado es obligatorio',
            'num_colegiado.integer' => 'El campo Nº de colegiado debe constar solo de numeros enteros',
            'num_colegiado.unique' => 'Ese Nº de colegiado ya existe',
            'curriculum.required' => 'El campo Curriculum es obligatorio',
            'curriculum.string' => 'El campo Curriculum debe de ser una cadena de caracteres',
        ];
    }
}
