<?php

namespace App\Http\Requests\Project\Tabs\IdentificationProject;

use Illuminate\Foundation\Http\FormRequest;

final class ApprovedRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'motive' => ['nullable', 'max:65000'],
        ];
    }

    public function message(string $name = 'campo'): string
    {
        return "Os dados de {$name} da inscrição do projeto foram <strong>aprovados com sucesso!</strong>";
    }

    public function alert(): string
    {
        return "Os dados da inscrição do projeto foram <strong>aprovados com sucesso!</strong>";
    }
}
