<?php

namespace App\Http\Requests\Public\Register;

use App\Helpers\Fill;
use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'max:191'],
            'price' => ['required', 'numeric'],
            'resume' => ['nullable', 'max:65000'],
            'description' => ['nullable', 'max:65000'],
            'objectives' => ['nullable', 'max:65000'],
            'justification' => ['nullable', 'max:65000'],
            'target' => ['nullable', 'max:65000'],
            'cronogram' => ['nullable', 'max:65000'],
            'accessibility' => ['nullable', 'max:65000'],
            'plan' => ['nullable', 'max:65000'],
            'contra_partid_social' => ['nullable', 'max:65000'],
            'locals' => ['nullable', 'max:65000'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nome do projeto',
            'price' => 'valor do projeto',
            'resume' => 'resumo da proposta',
            'description' => 'descrição da propsota',
            'objectives' => 'objetivos e metas',
            'justification' => 'jsutificativa',
            'target' => 'público alvo',
            'cronogram' => 'cronograma de execução',
            'accessibility' => 'medidas de acessiblidade',
            'plan' => 'palno de divulgação',
            'contra_partid_social' => 'contrapartida social',
            'locals' => 'locais previstos para realização da ação cultural',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'price' => Fill::maskCurrencyBrlToEua($this->price),
        ]);
    }
}
