<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

final class CityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:191'],
            'uf_id' => ['required', 'integer'],
            'description' => ['nullable', 'max:65000'],
            'is_active' => ['nullable', 'integer'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nome da cidade',
            'uf_id' => 'estado',
            'description' => 'descrição',
            'is_active' => 'ativo',
        ];
    }

    protected function prepareForValidation(): void
    {
        $action = $this->isMethod('POST') ? 'registrada' : 'alterado';

        $this->merge([
            'name' => trim(mb_strtoupper($this->name)),
            'message' => "Cidade de <strong class='text-uppercase'>{$this->name}</strong> {$action} com sucesso!",
        ]);
    }
}
