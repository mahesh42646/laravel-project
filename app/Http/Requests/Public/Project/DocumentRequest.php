<?php

namespace App\Http\Requests\Public\Project;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class DocumentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'document' => ['required', File::types('pdf')->max('10mb')],
        ];
    }

    public function attributes(): array
    {
        return [
            'document' => 'documento',
        ];
    }

    public function messages(): array
    {
        return [
            'document.required' => '<strong>Atenção!</strong> O arquivo não foi carregado, tente novamente!',
            'document.mimes' => 'O arquivo a ser carregado deve ser do tipo <strong>PDF!</strong>',
            'document.max' => 'O arquivo a ser carregado não podem ser superior a <strong>10 megabytes</strong>',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'message' => 'O arquivo foi enviado com <strong>sucesso</strong>!',
        ]);
    }
}
