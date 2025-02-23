<?php

namespace App\Http\Requests\Project\Tabs\InscriptionProject;

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

    public function message(): string
    {
        return "Os dados da inscrição do projeto foram <strong>reprovados</strong>!";
    }
}
