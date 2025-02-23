<?php

namespace App\Http\Requests\Project\Tabs;

use Illuminate\Foundation\Http\FormRequest;

class ProponentProjectRepprovedRequest extends FormRequest
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

    protected function prepareForValidation(): void
    {
        $this->merge([
            'message' => "Os dados do projeto foram <strong>reprovados</strong>!",
        ]);
    }
}
