<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'bail|required|min:2|max:50',
            'last_name' => 'bail|required|min:1|max:50',
            'remember' => 'bail|max:150',
            'contact_type_id' => 'bail|required|integer',
            'email' => 'bail|nullable|email'
        ];
    }

    /**
     *MENSAGENS DE VALIDAÇÃO PERSONALIZADAS
     */

    public function attributes()
    {
        return [
            'contact_type_id' => 'tipo de contato',
        ];
    }
}
