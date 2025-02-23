<?php

namespace App\Http\Requests\Project\Tabs;

use Illuminate\Foundation\Http\FormRequest;

class ProponentDocumentRepprovedRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'motive' => ['required', 'max:65000'],
        ];
    }

    public function attributes(): array
    {
        return [
            'motive' => 'motivo',
        ];
    }

    public function message(): string
    {
        if ($this->repproved) {
            return "O documento <strong>{$this->document_name}</strong> foi Reprovado!";
        }

        if ($this->reanalyze) {
            return "O documento <strong>{$this->document_name}</strong> foi para Reanálise!";
        }
    }
}
