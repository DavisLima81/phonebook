<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneRequest extends FormRequest
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
        /* VALIDAÇÃO */
        return [
            'phone_area_id' => 'bail|required',
            'number' => 'bail|required|integer|min:10000001|max:999999999',
            'phone_type_id' => 'bail|required',
            'contact_id' => 'bail|required',
        ];
    }

    /**
     *MENSAGENS DE VALIDAÇÃO PERSONALIZADAS
     */

    public function attributes()
    {
        return [
            'phone_area_id' => 'código de área',
            'phone_type_id' => 'tipo de telefone'
            //'contact_id' => 'contato',
        ];
    }
}
