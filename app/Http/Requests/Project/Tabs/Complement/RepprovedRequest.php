<?php

namespace App\Http\Requests\Project\Tabs\Complement;

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
        return "Os dados dos {$name} do projeto foram <strong>reprovados</strong>!";
    }

    public function alert(): string
    {
        return "Os dados dos Links complementares do seu projeto foram <strong>reprovados</strong>!";
    }
}
