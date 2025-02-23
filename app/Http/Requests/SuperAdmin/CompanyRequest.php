<?php

namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        if ($this->isMethod('POST')) {
            return [
                'name' => ['required', 'max:191'],
                'cnpj' => ['required', 'size:18', 'unique:companies'],
                'responsible' => ['required', 'max:191'],
                'cpf' => ['required', 'size:14'],
                'address' => ['nullable', 'max:100'],
                'phone' => ['nullable', 'max:50'],
                'observation' => ['nullable', 'max:65000'],
            ];
        }
        
        return [
            'name' => ['required', 'max:191'],
            'cnpj' => ['required', 'size:18', Rule::unique('companies')->ignore($this->company->id)],
            'responsible' => ['required', 'max:191'],
            'cpf' => ['required', 'size:14'],
            'address' => ['nullable', 'max:100'],
            'phone' => ['nullable', 'size:15'],
            'observation' => ['nullable', 'max:65000'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nome',
            'cnpj' => 'cnpj',
            'responsible' => 'responsável',
            'cpf' => 'CPF',
            'address' => 'endereço',
            'phone' => 'telefone',
            'observation' => 'endereço completo',
        ];
    }

    public function messages(): array
    {
        return [
            'cnpj.size' => 'O campo CNPJ deve conter 14 dígitos',
            'cpf.size' => 'O campo CPF deve conter 11 dígitos',
            'phone.size' => 'O campo telefone deve conter 11 dígitos',
        ];
    }

    protected function prepareForValidation(): void
    {
        $action = $this->isMethod('POST') ? 'registrada' : 'alterada';
        
        $this->merge([
            'name' => trim(mb_strtoupper($this->name)),
            'responsible' => trim(mb_strtoupper($this->responsible)),
            'message' => "Empresa <strong class='text-uppercase'>{$this->name}</strong> {$action} com sucesso!",
        ]);
    }
}
