<?php

namespace App\Http\Requests\Project\Tabs;

use Illuminate\Foundation\Http\FormRequest;

final class NotetRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'price' => ['required', 'numeric'],
        ];
    }

    public function attributes(): array
    {
        return [
            'note' => 'Valor do Projeto',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'price' => str_replace(',', '.', $this->note),
        ]);
    }
}
