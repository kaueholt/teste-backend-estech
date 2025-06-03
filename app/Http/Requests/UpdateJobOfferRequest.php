<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobOfferRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'active' => 'sometimes|boolean',
            'CLT' => 'sometimes|boolean',
            'PJ' => 'sometimes|boolean',
            'Freelancer' => 'sometimes|boolean',
        ];
    }

    public function messages()
    {
        return [
            'title.string' => 'O campo :attribute deve ser uma string',
            'title.max' => 'O campo :attribute não pode ter mais de 255 caracteres',
            'description.string' => 'O campo :attribute deve ser uma string',
            'active.boolean' => 'O campo :attribute deve ser verdadeiro ou falso',
            'clt.boolean' => 'O campo :attribute deve ser verdadeiro ou falso',
            'pj.boolean' => 'O campo :attribute deve ser verdadeiro ou falso',
            'freelancer.boolean' => 'O campo :attribute deve ser verdadeiro ou falso',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'título',
            'description' => 'descrição',
            'active' => 'ativo',
            'clt' => 'contrato pode ser CLT',
            'pj' => 'contrato pode ser PJ',
            'freelancer' => 'contrato pode ser freelancer',
        ];
    }
}