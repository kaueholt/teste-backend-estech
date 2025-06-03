<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestroyUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id'
        ];
    }

    public function messages()
    {
        return [
            'user_ids.required' => 'O campo :attribute é obrigatório',
            'user_ids.array' => 'O campo :attribute deve ser um array',
            'user_ids.*.exists' => 'Um ou mais IDs de usuário fornecidos não existem'
        ];
    }

    public function attributes()
    {
        return [
            'user_ids' => 'IDs de usuário'
        ];
    }
}
