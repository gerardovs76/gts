<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacturacionRequest extends FormRequest
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
            'codigo' => 'required|unique:facturacion',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'valor' => 'required',
            'referencias' => 'required',
            'num_referencia' => 'required',
            'nombres' => 'required'
        ];
    }
}
