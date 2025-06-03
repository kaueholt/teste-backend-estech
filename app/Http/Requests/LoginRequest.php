<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'O campo :attribute é obrigatório',
            'email.email' => 'O campo :attribute deve ser um endereço de e-mail válido',
            'password.required' => 'O campo :attribute é obrigatório',
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'e-mail',
            'password' => 'senha',
        ];
    }
}