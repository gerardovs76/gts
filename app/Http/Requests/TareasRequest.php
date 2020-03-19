<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TareasRequest extends FormRequest
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
            'profesor' => 'required',
            'curso' => 'required',
            'especialidad' => 'required',
            'fecha_entrega' => 'required',
            'tipo_tarea' => 'required',
            'titulo' => 'required',
            'descripcion' => 'required',
        ];
    }
}
