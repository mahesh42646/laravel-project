<?php

namespace App\Http\Requests\Project\Tabs\IdentificationProject;

use Illuminate\Foundation\Http\FormRequest;

final class RepprovedRequest extends FormRequest
{
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

    public function message(string $name = 'campo'): string
    {
        return "Os dados de {$name} da inscrição do projeto foram <strong>reprovados</strong>!";
    }

    public function alert(): string
    {
        return "Os dados de inscrição do projeto foram <strong>reprovados</strong>!";
    }
}
