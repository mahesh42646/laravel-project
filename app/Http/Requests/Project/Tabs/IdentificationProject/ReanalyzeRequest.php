<?php

namespace App\Http\Requests\Project\Tabs\IdentificationProject;

use Illuminate\Foundation\Http\FormRequest;

final class ReanalyzeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'motive' => ['required', 'max:65000'],
            'expired_at' => ['required', 'date'],
            'hour' => ['required', 'min:5'],
        ];
    }

    public function attributes(): array
    {
        return [
            'motive' => 'motivo',
            'expired_at' => 'data limite',
            'hour' => 'hora limite',
        ];
    }

    public function message(string $name = 'campo'): string
    {
        return "Os dados de {$name} foram para <strong>reanálise</strong>!";
    }

    public function alert(): string
    {
        return "Os dados da inscrição do projeto foram para <strong>reanálise</strong>!";
    }
}
