<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerNotasRequest extends FormRequest
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
        $rules = [
            'curso' => 'required',
            'paralelo' => 'required',
            'parcial' => 'required',
            'quimestre' => 'required',
            'materia' => 'required',
           ];
      return $rules;
    }
}
