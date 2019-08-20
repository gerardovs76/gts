<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatriculacionRequest extends FormRequest
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
           'cedula' => 'required|unique:matriculados',
            'nombres' => 'required',
            'apellidos' => 'required',
            'curso' => 'required',
            'especialidad' => 'required',
            'paralelo' => 'required',
            'cedula_r' => 'required',
            'razon_social' => 'required',
            'direccion_factura' => 'required',
            'telefono_factura' => 'required',
        ];
    }
}
