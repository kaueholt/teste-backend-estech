<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'recruiter' => 'required|boolean',
        ];
    }
    
    public function messages()
    {
        return [
            'name.max' => 'O campo :attribute não pode ter mais de 255 caracteres',
            'name.required' => 'O campo :attribute é obrigatório',
            'name.string' => 'O campo :attribute deve ser uma string',
            'email.email' => 'O campo :attribute deve ser um endereço de e-mail válido',
            'email.max' => 'O campo :attribute não pode ter mais de 255 caracteres',
            'email.required' => 'O campo :attribute é obrigatório',
            'email.string' => 'O campo :attribute deve ser uma string',
            'email.unique' => 'O :attribute já está em uso',
            'password.min' => 'O campo :attribute deve ter pelo menos 8 caracteres',
            'password.required' => 'O campo :attribute é obrigatório',
            'password.string' => 'O campo :attribute deve ser uma string',
            'recruiter.boolean' => 'O campo :attribute deve ser verdadeiro ou falso',
            'recruiter.required' => 'O campo :attribute é obrigatório',
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'e-mail',
            'password' => 'senha',
            'name' => 'nome',
            'recruiter' => 'recrutador',
        ];
    }
}