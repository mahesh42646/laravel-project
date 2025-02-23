<?php

namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class TenantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        if ($this->isMethod('POST')) {
            return [
                'city_id' => ['required', 'integer'],
                'name' => ['required', 'max:191'],
                'cnpj' => ['required', 'size:18', 'unique:tenants'],
                'phone' => ['required', 'size:15'],
                'new_logo' => ['nullable', File::image()->max('80kb')],
                'company_id' => ['required', 'integer'],
                'observation' => ['nullable', 'max:65000'],
            ];
        }

        return [
            'city_id' => ['required', 'integer'],
            'name' => ['required', 'max:191'],
            'cnpj' => ['required', 'size:18', Rule::unique('tenants')->ignore($this->tenant->id)],
            'phone' => ['required', 'size:15'],
            'logo_update' => ['nullable', File::image()->max('80kb')],
            'company_id' => ['required', 'integer'],
            'is_active' => ['nullable', 'integer'],
            'observation' => ['nullable', 'max:65000'],
        ];
    }

    public function attributes(): array
    {
        return [
            'city_id' => 'cidade',
            'name' => 'razão social',
            'cnpj' => 'CNPJ',
            'phone' => 'telefone',
            'new_logo' => 'brasão',
            'logo_update' => 'brasão',
            'is_active' => 'situação',
            'company_id' => 'empresa vinculada',
            'observation' => 'observações',
        ];
    }

    public function messages(): array
    {
        return [
            'cnpj.unique' => 'O CNPJ informado já está sendo utilizado',
            'cnpj.size' => 'O campo CNPJ deve conter 14 dígitos',
            'phone.size' => 'O campo telefone deve conter 11 dígitos',
        ];
    }

    protected function prepareForValidation(): void
    {
        $action = $this->isMethod('POST') ? 'cadastrado' : 'alterado';

        $this->merge([
            'name' => trim(mb_strtoupper($this->name)),
            'message' => "Cliente <strong class='text-uppercase'>{$this->name}</strong> {$action} com sucesso!",
        ]);
    }
}
