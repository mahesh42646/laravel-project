<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'min:2', 'max:191'],
            'cnpj' => ['nullable', 'max:50'],
            'cpf' => ['nullable', 'max:50'],
            'phone' => ['nullable', 'max:50'],
            'logo' => ['nullable', 'mimes:png,jpg,jpeg,svg,gif,webp', 'max:2048'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nome da empresa',
            'cnpj' => 'cnpj',
            'cpf' => 'cpf',
            'phone' => 'telefone',
            'logo' => 'logomarca',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'message' => "Dados da empresa <strong>atualizados</strong> com sucesso!",
        ]);
    }
}
