<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexJobRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'sort_by' => 'sometimes|string|in:title,description,active,clt,pj,freelancer',
            'sort_direction' => 'sometimes|string|in:asc,desc',
            'per_page' => 'sometimes|integer|min:1|max:100',
            'page' => 'sometimes|integer|min:1'
        ];
    }

    public function messages()
    {
        return [
            'sort_by.in' => 'O campo :attribute deve ser um dos seguintes: title, description, active, clt, pj ou freelancer',
            'sort_direction.in' => 'O campo :attribute deve ser "asc" ou "desc"',
            'per_page.min' => 'O campo :attribute deve ser no mínimo 1',
            'per_page.max' => 'O campo :attribute deve ser no máximo 100',
            'page.min' => 'O campo :attribute deve ser no mínimo 1',
        ];
    }

    public function attributes()
    {
        return [
            'sort_by' => 'campo para ordenação',
            'sort_direction' => 'direção da ordenação',
            'per_page' => 'itens por página',
            'page' => 'página atual'
        ];
    }
}
