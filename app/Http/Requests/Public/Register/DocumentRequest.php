<?php

namespace App\Http\Requests\Public\Register;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class DocumentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'documents.*' => ['nullable', File::types('pdf')->max('5mb')],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'documents_requireds' => $this->autoFilled(),
        ]);
    }

    public function messages(): array
    {
        return [
            'documents.*.mimes' => 'Os arquivos a serem carregados devem ser do tipo <strong>PDF!</strong>',
            'documents.*.max' => 'Os arquivos a serem carregados não podem ser superior a <strong>5 megabytes</strong>',
        ];
    }

    private function autoFilled(): array
    {
        $attributesFilleds = [];

        foreach ($this->documents_requireds as $documentRequired) {
            $attributesFilleds[] = $documentRequired ?: '0';
        }

        return $attributesFilleds;
    }
}
