<?php

namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class UserRequest extends FormRequest
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
                'date_of_birth' => ['nullable', 'date'],
                'gender_id' => ['required', 'integer'],
                'cpf' => ['nullable', 'max:50'],
                'rg' => ['nullable', 'max:100'],
                'schooling_id' => ['nullable', 'integer'],
                'role_name' => ['nullable', 'max:191'],
                'role_id' => ['required', 'integer'],
                'email' => ['required', 'unique:users', 'max:100'],
                'phone' => ['nullable', 'max:50'],
                'observation' => ['nullable', 'max:65000'],
                'new_photo' => ['nullable', File::image()->max('10mb')],
                'tenants' => ['required', 'array'],
                'created_by' => ['required', 'integer'],
            ];
        }

        return [
            'name' => ['required', 'max:191'],
            'date_of_birth' => ['nullable', 'date'],
            'gender_id' => ['required', 'integer'],
            'cpf' => ['nullable', 'max:50'],
            'rg' => ['nullable', 'max:100'],
            'schooling_id' => ['nullable', 'integer'],
            'role_name' => ['nullable', 'max:191'],
            'role_id' => ['required', 'integer'],
            'email' => ['required', 'max:100', Rule::unique('users')->ignore($this->user->id)],
            'phone' => ['nullable', 'max:50'],
            'observation' => ['nullable', 'max:65000'],
            'tenants' => ['required', 'array'],
            'profile_photo_update' => ['nullable', File::image()->max('10mb')],
            'created_by' => ['required', 'integer'],
            'is_active' => ['required', 'integer'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nome completo',
            'date_of_birth' => 'data de nascimento',
            'gender_id' => 'sexo',
            'cpf' => 'CPF',
            'rg' => 'RG',
            'schooling_id' => 'escolaridade',
            'role_name' => 'cargo',
            'role_id' => 'perfil de acesso',
            'email' => 'e-mail',
            'password' => 'senha',
            'phone' => 'telefone',
            'tenants' => 'prefeituras',
            'observation' => 'endereço completo',
            'new_photo' => 'foto de perfil',
            'profile_photo_update' => 'foto de perfil',
        ];
    }

    public function messages(): array
    {
        return [
            'cpf.size' => 'O campo CPF deve conter 11 dígitos',
            'phone.size' => 'O campo telefone deve conter 11 dígitos',
        ];
    }

    protected function prepareForValidation(): void
    {
        $action = $this->isMethod('POST') ? 'cadastrado' : 'alterado';
        
        $this->merge([
            'name' => trim(mb_strtoupper($this->name)),
            'email' => trim(mb_strtolower($this->email)),
            'created_by' => auth()->id(),
            'message' => "Usuário <strong class='text-uppercase'>{$this->name}</strong> {$action} com sucesso!",
        ]);
    }
}
