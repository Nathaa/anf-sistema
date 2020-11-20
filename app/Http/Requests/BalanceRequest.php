<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BalanceRequest extends FormRequest
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
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'monto' => 'required'

        ];
    }

    
    public function messages(){

        return[
                    'fecha_inicio.required' => 'La fecha inicial no debe quedar vacio',
                    'fecha_final.required' => 'La fecha final no debe quedar vacio',
                    'monto.required' => 'El monto es requerido',
                    'monto.numeric' => 'No debe introducir letras o caracteres',
        ];
    }

   protected function formatErrors(Validator $validator)
    {
        
        $messages = $validator->messages();

        foreach ($messages->all() as $message)
        {
            Toastr::error($message, 'Failed', ['timeOut' => 10000]);
        }

        return $validator->errors()->all();
    }
}
