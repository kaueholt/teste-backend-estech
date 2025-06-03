<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,'.$this->user->id,
            'password' => 'sometimes|string|min:8|confirmed',
            'recruiter' => 'sometimes|boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'O campo :attribute não pode ter mais de 255 caracteres',
            'name.string' => 'O campo :attribute deve ser uma string',
            'email.email' => 'O campo :attribute deve ser um endereço de e-mail válido',
            'email.max' => 'O campo :attribute não pode ter mais de 255 caracteres',
            'email.string' => 'O campo :attribute deve ser uma string',
            'email.unique' => 'O :attribute já está em uso',
            'password.min' => 'O campo :attribute deve ter pelo menos 8 caracteres',
            'password.string' => 'O campo :attribute deve ser uma string',
            'recruiter.boolean' => 'O campo :attribute deve ser verdadeiro ou falso',
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