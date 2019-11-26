<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotasRequest extends FormRequest
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
            'parcial' => 'required',
            'quimestre' => 'required',
            'materias_id' => 'required',
           ];
      foreach($this->request->get('parcial') as $key => $val) {
          $rules['parcial.*'] = 'required';
      }
      foreach($this->request->get('quimestre') as $key => $val)
      {
          $rules['quimestre.*'] = 'required';
      }
      return $rules;
    }

}
