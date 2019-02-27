<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BadgeCreateRequest extends FormRequest
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
            'participants' => 'nullable|string',
            'style_attributes' => 'required',
            'layout' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'participants.string' => 'Impossível leitura de participantes',
            'style_attributes.required' => 'É necessário as informações pra criaçãr o pdf',
        ];
    }
}
