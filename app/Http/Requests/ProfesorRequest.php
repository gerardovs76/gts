<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfesorRequest extends FormRequest
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
            'cedula' => 'required',
            'nombres_apellidos' => 'required',
            'direccion' => 'required',
            'fecha_nacimiento' => 'required',
            'correo' => 'required',
            'movil' => 'required',
            'convencional' => 'required',
            'perfil_docente' => 'required',
            'ultimo_trabajo' => 'required',
            'tipo_contrato' => 'required',
            'cargo' => 'required',
        ];
    }
}
