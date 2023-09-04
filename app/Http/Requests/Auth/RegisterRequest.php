<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => [
                'required',
                'string',
                'min:3',
                'regex:/^[A-Za-z0-9]+$/',
                'unique:users,username',
            ],
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo é obrigatório',
            'username.min' => 'Deve conter no minimo 3 caracteres',
            'username.unique' => 'O nome de usuário já está sendo utilizado!',
            'username.regex' => 'O nome de usuário só pode conter letras e números.',
            'email' => 'E-mail inválido',
            'email.unique' => 'Este e-mail já está sendo utilizado!',
            'password.min' => 'Deve conter no minimo 6 caracteres',
            'password.required' => 'Por favor, informe a senha',
            'password_confirmation.confirmed' => 'As senhas não coincidem',
        ];
    }
}
