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
            'participants' => 'required|string',
            'details_badge' => 'required',
            'layout' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'participants.required' => 'É necessário ter os participantes para gerar os pdfs',
            'participants.string' => 'Impossível leitura de participantes',
            'details_badge.required' => 'É necessário as informações pra criaçãr o pdf',
            'layout.required' => 'Imagem do pdf é necessária.'
        ];
    }
}
