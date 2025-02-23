<?php

namespace App\Http\Requests\Project;

use App\Helpers\Fill;
use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'edital_id' => ['required', 'integer'],
            'customer_id' => ['required', 'integer'],
            'customer_company_name' => ['nullable', 'max:191'],
            'customer_cnpj' => ['nullable', 'max:100'],
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
            'documents.*' => ['required', 'mimes:pdf', 'max:50120'],
        ];
    }

    public function attributes(): array
    {
        return [
            'edital_id' => 'edital',
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

    public function messages(): array
    {
        return [
            'documents.*.mimes' => 'Os arquivos a serem caregados devem ser do tipo <strong>PDF!</strong>'
        ];
    }

    protected function prepareForValidation(): void
    {
        $action = $this->isMethod('POST') ? 'registrado' : 'alterado';

        $this->merge([
            'price' => Fill::maskCurrencyBrlToEua($this->price),
            'message' => "Projeto {$action} com sucesso!",
        ]);
    }
}
