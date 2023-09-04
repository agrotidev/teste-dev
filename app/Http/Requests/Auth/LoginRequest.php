<?php

namespace App\Http\Requests\Auth;

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
            'login' => 'required|string|min:3',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo é obrigatório',
            'login.min' => 'Deve conter no minimo 3 caracteres',
            'password.min' => 'Deve conter no minimo 6 caracteres',
            'password.required' => 'Por favor, informe a senha',
        ];
    }
}
