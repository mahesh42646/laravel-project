<?php

namespace App\Http\Requests\Public\Profile;

use App\Helpers\Fill;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class CustomerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => ['required', 'size:2'],
            'cpf' => ['required', 'size:14'],
            'cnpj' => ['nullable', 'size:18'],
            'company_name' => ['nullable', 'max:191'],
            'rg' => ['required', 'max:191'], 
            'name' => ['required', 'max:191'],
            'gender_id' => ['required', 'integer'],
            'name_social' => ['nullable', 'max:100'],
            'breed_id' => ['required', 'integer'],
            'is_lgbt' => ['required', 'integer'],
            'schooling_id' => ['required', 'integer'],
            'income' => ['required', 'numeric'],
            'area_atuation_id' => ['required', 'integer'],
            'area_atuation_other' => ['nullable', 'max:191'],
            'community_traditional_id' => ['nullable', 'integer'],
            'address' => ['nullable', 'max:191'],
            'city' => ['required', 'max:191'],
            'phone' => ['required', 'size:15'],
            'email' => ['required', 'max:100'],
            'is_active' => ['nullable', 'integer'],
            'profile_photo_update' => ['nullable', File::image()->max('100kb')],
            'profile_cover_update' => ['nullable', File::image()->max('100kb')],
        ];
    }

    public function attributes(): array
    {
        return [
            'type' => 'tipo',
            'cpf' => 'CPF',
            'cnpj' => 'CNPJ',
            'company_name' => 'nome da empresa',
            'rg' => 'RG',
            'name' => 'nome completo',
            'gender_id' => 'gênero',
            'name_social' => 'nome social',
            'breed_id' => 'raça',
            'is_lgbt' => 'você é LGBTQIAPN+?',
            'schooling_id' => 'escolaridade',
            'income' => 'renda individual',
            'area_atuation_id' => 'principal área de atuação',
            'area_atuation_other' => 'outras áreas de atuação',
            'community_traditional_id' => 'comunidades tradicionais',
            'city' => 'cidade',
            'address' => 'endereço completo',
            'phone' => 'telefone',
            'email' => 'e-mail',
            'profile_photo_update' => 'foto de perfil',
            'profile_cover_update' => 'foto da capa',
        ];
    }

    public function messages(): array
    {
        return [
            'cpf.unique' => 'O CPF informado já está sendo utilizado',
            'cpf.size' => 'O campo CPF deve conter 11 dígitos',
            'phone.size' => 'O campo telefone deve conter 11 dígitos',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => trim(mb_strtoupper($this->name)),
            'email' => trim(mb_strtolower($this->email ?: '')),
            'income' => Fill::maskCurrencyBrlToEua($this->income),
            'city' => trim(mb_strtoupper($this->city)),
            'company_name' => trim(mb_strtoupper($this->company_name ?: '')),
            'message' => "Os dados do seu perfil foram <strong>atualizados</strong> com sucesso!",
        ]);
    }
}
