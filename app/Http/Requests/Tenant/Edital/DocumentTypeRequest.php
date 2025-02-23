<?php

namespace App\Http\Requests\Tenant\Edital;

use Illuminate\Foundation\Http\FormRequest;

final class DocumentTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:191'],
            'people_type_id' => ['required', 'integer'],
            'is_active' => ['nullable', 'integer'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => '<strong>nome do arquivo</strong>',
            'people_type_id' => '<strong>tipo de pessoa</strong>',
            'is_active' => '<strong>status</strong>',
        ];
    }

    public function payload(): array
    {
        $data = [
            'name' => trim(mb_strtoupper($this->name)),
            'people_type_id' => $this->people_type_id,
            'tenant_id' => session('tenant_id'),
        ];

        if ($this->isMethod('PUT')) {
            $data['is_active'] = $this->is_active;
        }

        return $data;
    }

    public function message(): string
    {
        return $this->isMethod('POST')
            ? "Tipo de campo <strong>registrado</strong> com sucesso!"
            : "Tipo de campo <strong>atualizado</strong> com sucesso!";
    }
}
