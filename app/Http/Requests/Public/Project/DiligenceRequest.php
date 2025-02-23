<?php

namespace App\Http\Requests\Public\Project;

use App\Enums\Project\Diligence\SenderEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class DiligenceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'content' => ['required', 'max:65000'],
            'analyst_id' => ['required', 'integer'],
            'customer_id' => ['required', 'integer'],
            'attachments.*' => ['nullable', File::types('pdf')->max('10mb')],
            'files_names' => ['nullable', 'array'],
            'registered_at' => ['required', 'date'],
            'sender_id' => ['required', 'integer'],
        ];
    }

    public function attributes(): array
    {
        return [
            'content' => 'conteúdo',
            'analyzed_by' => 'analisado por',
            'files_names' => 'nome do arquivo',
        ];
    }

    public function messages(): array
    {
        return [
            'attachments.*.mimes' => 'Os arquivos a serem carregados devem ser do tipo <strong>PDF!</strong>'
        ];
    }

    protected function prepareForValidation(): void
    {       
        $this->merge([
            'analyst_id' => $this->analyst_id,
            'customer_id' => $this->customer_id,
            'registered_at' => date('Y-m-d H:i:s'),
            'sender_id' => SenderEnum::CUSTOMER->value,
            'message' => "Diligência <strong>enviada</strong> com sucesso!",
        ]);
    }
}
