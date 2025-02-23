<?php

namespace App\Http\Requests\Tenant\Edital;

use App\Helpers\Fill;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

final class EditalRequest extends FormRequest
{
    public function rules(): array
    {
        if ($this->isMethod('POST')) {
            return [
                'type_id' => ['required', 'integer'],
                'name' => ['required', 'max:191'],
                'price' => ['required', 'max:50'],
                'vacancies' => ['required', 'integer'],
                'open_at' => ['required', 'date'],
                'horary_open_at' => ['required', 'max:10'],
                'closed_at' => ['required', 'date'],
                'horary_closed_at' => ['required', 'max:10'],
                'quotas' => ['required', 'array'],
                'people_types' => ['required', 'array'],
                'register_type_id' => ['required', 'integer'],
                'observation' => ['nullable', 'max:65000'],
                'documentation_type_requireds' => ['required', 'array'],
                'logo' => ['nullable', File::image()->max('100kb')],
                'banner' => ['nullable', File::image()->max('100kb')],
                'attachment_names' => ['nullable', 'array'],
                'attachment_files' => ['nullable', 'array'],
            ];
        }

        return [
            'type_id' => ['required', 'integer'],
            'name' => ['required', 'max:191'],
            'price' => ['required', 'max:50'],
            'vacancies' => ['required', 'integer'],
            'open_at' => ['required', 'date'],
            'horary_open_at' => ['required', 'max:10'],
            'closed_at' => ['required', 'date'],
            'horary_closed_at' => ['required', 'max:10'],
            'quotas' => ['required', 'array'],
            'register_type_id' => ['required', 'integer'],
            'observation' => ['nullable', 'max:65000'],
            'documentation_type_requireds' => ['required', 'array'],
            'logo' => ['nullable', File::image()->max('100kb')],
            'banner' => ['nullable', File::image()->max('100kb')],
            'attachment_names' => ['nullable', 'array'],
            'attachment_files' => ['nullable', 'array'],
        ];
    }

    public function attributes(): array
    {
        return [
            'type_id' => '<strong>tipo de edital</strong>',
            'name' => '<strong>nome do edital (projeto)</strong>',
            'open_at' => '<strong>data de abertura</strong>',
            'horary_open_at' => '<strong>hora de abertura</strong>',
            'closed_at' => '<strong>data de encerramento</strong>',
            'horary_closed_at' => '<strong>hora de encerramento</strong>',
            'price' => '<strong>valor do projeto</strong>',
            'vacancies' => '<strong>número de vagas</strong>',
            'quotas' => '<strong>cotas</strong>',
            'people_types' => '<strong>tipo de participação</strong>',
            'observation' => '<strong>observações</strong>',
            'status' => '<strong>status</strong>',
            'documentation_type_requireds' => '<strong>documentação obrigatória</strong>',
            'logo' => '<strong>foto do edital</strong>',
            'banner' => '<strong>banner do edital</strong>',
            'extended_at' => '<strong>data de prorrogação</strong>',
            'horary_extended_at' => '<strong>hora de prorrogação</strong>',
            'documentation_type_id' => '<strong>tipo de documentação a ser requerida pelo participante</strong>',
        ];
    }

    public function payload(): array
    {
        if ($this->isMethod('POST')) {
            return [
                'type_id' => $this->type_id,
                'name' => trim(mb_strtoupper($this->name)),
                'register_type_id' => $this->register_type_id,
                'open_at' => $this->open_at,
                'horary_open_at' => $this->horary_open_at,
                'closed_at' => $this->closed_at,
                'horary_closed_at' => $this->horary_closed_at,
                'price' => Fill::maskCurrencyBrlToEua($this->price),
                'vacancies' => $this->vacancies,
                'observation' => $this->observation,
                'tenant_id' => session('tenant_id'),
           ];
        }

        return [
            'type_id' => $this->type_id,
            'name' => trim(mb_strtoupper($this->name)),
            'register_type_id' => $this->register_type_id,
            'open_at' => $this->open_at,
            'horary_open_at' => $this->horary_open_at,
            'closed_at' => $this->closed_at,
            'horary_closed_at' => $this->horary_closed_at,
            'extended_at' => $this->extended_at,
            'horary_extended_at' => $this->horary_extended_at,
            'price' => Fill::maskCurrencyBrlToEua($this->price),
            'vacancies' => $this->vacancies,
            'observation' => $this->observation,
            'status' => $this->status,
       ];
    }

    public function message(): string
    {
        return $this->isMethod('POST')
            ? 'Edital <strong>registrado</strong> com sucesso!'
            : 'Edital <strong>atualizado</strong> com sucesso!';
    }
}
