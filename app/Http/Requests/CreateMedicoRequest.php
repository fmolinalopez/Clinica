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
        $rules = array();

        $rules['imagen'] = $this->validarImagen();
        $rules['nombre'] = $this->validarNombre();
        $rules['email'] = $this->validarEmail();
        $rules['especialidad'] = $this->validarEspecialidad();
//        $rules['clinicas'] = $this->validarClinicas();
        $rules['num_colegiado'] = $this->validarNumColegiado();
        $rules['curriculum'] = $this->validarCurriculum();

        return $rules;
    }

    /**
     * Definición de los mensajes de validación.
     *
     * @return array
     */
    public function messages()
    {
        $mensajesImagen = $this->mensajesImagen();
        $mensajesNombre = $this->mensajesNombre();
        $mensajesEmail = $this->mensajesEmail();
        $mensajesEspecialidad = $this->mensajesEspecialidad();
        $mensajesClinicas = $this->mensajesClinicas();
        $mensajesNumColegiado = $this->mensajesNumColegiado();
        $mensajesCurriculum = $this->mensajesCurriculum();
        $mensajes = array_merge(
            $mensajesImagen,
            $mensajesNombre,
            $mensajesEmail,
            $mensajesEspecialidad,
            $mensajesClinicas,
            $mensajesNumColegiado,
            $mensajesCurriculum
        );
        return $mensajes;
    }

    public function validarImagen()
    {
        return 'required';
    }

    public function validarNombre()
    {
        return 'required|alpha';
    }

    public function validarEmail()
    {
        return 'required|email|unique:medicos';
    }

    public function validarEspecialidad()
    {
        return 'required|alpha';
    }

    public function validarClinicas()
    {
        return 'required';
    }

    public function validarNumColegiado()
    {
        return 'required|integer|unique:medicos';
    }

    public function validarCurriculum()
    {
        return 'required|alpha_num';
    }

    public function mensajesImagen(){
        $mensajes = array();
        $mensajes['imagen.required'] = 'El campo Imagen es obligatorio.';
        return $mensajes;
    }

    public function mensajesNombre(){
        $mensajes = array();
        $mensajes['nombre.required'] = 'El campo Nombre es obligatorio.';
        $mensajes['nombre.alpha'] = 'El campo Nombre debe contener solo caracteres alfabeticos.';
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

    public function mensajesClinicas(){
        $mensajes = array();
        $mensajes['clinicas.required'] = 'Debes seleccionar al menos una clinica';
        return $mensajes;
    }

    public function mensajesNumColegiado(){
        $mensajes = array();
        $mensajes['num_colegiado.required'] = 'El campo Nº de colegiado es obligatorio';
        $mensajes['num_colegiado.integer'] = 'El campo Nº de colegiado debe constar solo de numeros enteros';
        $mensajes['num_colegiado.unique'] = 'Ese Nº de colegiado ya existe';
        return $mensajes;
    }

    public function mensajesCurriculum(){
        $mensajes = array();
        $mensajes['curriculum.required'] = 'El campo Curriculum es obligatorio';
        $mensajes['curriculum.alpha'] = 'El campo Curriculum debe contener solo caracteres alfabeticos';
        return $mensajes;
    }

}
