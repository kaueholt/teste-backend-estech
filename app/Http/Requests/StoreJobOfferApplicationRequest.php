<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobOfferApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'job_offer_id' => 'required|exists:job_offers,id',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'O campo :attribute é obrigatório',
            'user_id.exists' => 'O ID de usuário fornecido não existe',
            'job_offer_id.required' => 'O campo :attribute é obrigatório',
            'job_offer_id.exists' => 'O ID de vaga de emprego fornecida não existe',
        ];
    }

    public function attributes()
    {
        return [
            'user_id' => 'ID de usuário',
            'job_offer_id' => 'ID da vaga de emprego',
        ];
    }
}