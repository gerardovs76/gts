<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InscripcionesRequest extends FormRequest
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
            'cedula' => 'required|unique:inscripciones',
            'nombres' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'required',
            'curso' => 'required',
            'direccion_alumno' => 'required',
            'sexo' => 'required',
            'representante' => 'required',
            'tipo_persona' => 'required',
            'sector' => 'required',
            'email' => 'required',
            'profesion' => 'required',
            'ocupacion' => 'required',
            'cedrepresentante' => 'required',
            'nombres_representante' => 'required',
            'direccion_representante' => 'required',
            'fn_representante' => 'required',
            'movil' => 'required',
            'convencional' => 'required',
            'edad_representante' => 'required',
            'tipo_estudiante' => 'required',
            'codigo_nuevo' => 'required|unique:inscripciones'


                    ];
    }
}
