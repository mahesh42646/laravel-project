<?php

namespace App\Http\Requests\Project\Tabs\InscriptionProject;

use Illuminate\Foundation\Http\FormRequest;

final class ReanalyzeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'motive' => ['required', 'max:65000'],
            'registered_at' => ['required', 'date'],
            'hour' => ['required', 'min:5'],
        ];
    }

    public function attributes(): array
    {
        return [
            'motive' => 'motivo',
            'registered_at' => 'data limite',
            'hour' => 'hora limite',
        ];
    }

    public function message(): string
    {
        return "Os dados da inscrição do projeto foram para <strong>reanálise</strong>!";
    }
}
