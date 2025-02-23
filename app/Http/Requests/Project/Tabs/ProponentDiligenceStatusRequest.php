<?php

namespace App\Http\Requests\Project\Tabs;

use Illuminate\Foundation\Http\FormRequest;

class ProponentDiligenceStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'status' => ['required', 'integer'],
            'motive' => ['nullable', 'max:65000'],
            'analyzed_by' => ['required', 'integer'],
        ];
    }

    public function attributes(): array
    {
        return [
            'status' => 'status',
            'motive' => 'motivo',
            'analyzed_by' => 'analisado por',
        ];
    }

    protected function prepareForValidation(): void
    {       
        $this->merge([
            'analyzed_by' => auth()->id(),
            'motive' => $this->motive ?: '',
            'message' => "Diligência <strong>atualizada</strong> com sucesso!",
        ]);
    }
}
