<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ResetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'password' => ['required', 'confirmed', 'max:191'],
        ];
    }

    public function attributes(): array
    {
        return [
            'password' => 'nova senha',
            'password_confirmation' => 'confirmar senha',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'message' => 'A senha foi redefinida com sucesso. Por favor, faça o login com a nova senha.'
        ]);
    }
}
