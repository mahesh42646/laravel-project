<?php

namespace App\Http\Requests\Project\Tabs;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class ProponentDocumentUploadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'document' => ['required', File::types('pdf')->max('10mb')],
        ];
    }

    public function messages(): array
    {
        return [
            'document.mimes' => 'O documento a ser carregado deve ser do tipo PDF!'
        ]; 
    }

    public function attributes(): array
    {
        return [
            'document' => 'documento',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'message' => 'Arquivo carregado com sucesso!',
        ]);
    }
}
