<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;


class CreateMedicoAjaxRequest extends CreateMedicoRequest
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

        if($this->exists('imagen')){
            $rules['imagen'] = $this->validarImagen();
        }

        if($this->exists('nombre')) {
            $rules['nombre'] = $this->validarNombre();
        }

        if($this->exists('email')) {
            $rules['email'] = $this->validarEmail();
        }

        if($this->exists('especialidad')) {
            $rules['especialidad'] = $this->validarEspecialidad();
        }

//        if($this->exists('clinicas')) {
//            $rules['clinicas'] = $this->validarClinicas();
//        }

        if($this->exists('num_colegiado')) {
            $rules['num_colegiado'] = $this->validarNumColegiado();
        }

        if($this->exists('curriculum')) {
            $rules['curriculum'] = $this->validarCurriculum();
        }

        return $rules;
    }

    protected function failedValidation($validator)
    {
        $errors = $validator->errors();
        $response = new JsonResponse([
            'imagen' => $errors->get('imagen'),
            'nombre' => $errors->get('nombre'),
            'email' => $errors->get('email'),
            'especialidad' => $errors->get('especialidad'),
            'clinicas' => $errors->get('clinicas'),
            'num_colegiado' => $errors->get('num_colegiado'),
            'curriculum' => $errors->get('curriculum'),
        ]);

        throw new ValidationException($validator, $response);
    }
}
