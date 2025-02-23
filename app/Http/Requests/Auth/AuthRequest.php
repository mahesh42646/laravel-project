<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'max:191'],
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'E-mail',
            'password' => 'senha de acesso',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'message' => 'Email ou senha não coincidem com nossos registros!'
        ]);
    }
}
