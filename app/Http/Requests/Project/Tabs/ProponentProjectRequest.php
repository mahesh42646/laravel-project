<?php

namespace App\Http\Requests\Project\Tabs;

use App\Helpers\Fill;
use Illuminate\Foundation\Http\FormRequest;

class ProponentProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
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
            'name' => 'Nome do Projeto',
            'price' => 'Valor do Projeto',
            'resume' => 'Resumo da proposta',
            'description' => 'Descrição da proposta',
            'objectives' => 'Objetivos e metas',
            'justification' => 'Justificativa',
            'target' => 'Público-alvo',
            'cronogram' => 'Cronograma de execução',
            'accessibility' => 'Medidas de acessiblidade',
            'plan' => 'Plano de divulgação',
            'contra_partid_social' => 'Contrapartida social',
            'locals' => 'Locais previstos para realização da ação cultural',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'price' => Fill::maskCurrencyBrlToEua($this->price),
            'message' => "Dados do projeto do proponente <strong>atualizados</strong> com sucesso!",
        ]);
    }
}
