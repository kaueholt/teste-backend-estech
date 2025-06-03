<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobOfferRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'active' => 'required|boolean',
            'clt' => 'required|boolean',
            'pj' => 'required|boolean',
            'freelancer' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O campo :attribute é obrigatório',
            'title.string' => 'O campo :attribute deve ser uma string',
            'title.max' => 'O campo :attribute não pode ter mais de 255 caracteres',
            'description.required' => 'O campo :attribute é obrigatório',
            'description.string' => 'O campo :attribute deve ser uma string',
            'active.required' => 'O campo :attribute é obrigatório',
            'active.boolean' => 'O campo :attribute deve ser verdadeiro ou falso',
            'clt.required' => 'O campo :attribute é obrigatório',
            'clt.boolean' => 'O campo :attribute deve ser verdadeiro ou falso',
            'pj.required' => 'O campo :attribute é obrigatório',
            'pj.boolean' => 'O campo :attribute deve ser verdadeiro ou falso',
            'freelancer.required' => 'O campo :attribute é obrigatório',
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