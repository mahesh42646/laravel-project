<?php

namespace App\Http\Requests\Project\Tabs;

use App\Enums\Project\Diligence\SenderEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

final class ProponentDiligenceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:191'],
            'content' => ['required', 'max:65000'],
            'analyzed_by' => ['required', 'integer'],
            'analyst_id' => ['required', 'integer'],
            'customer_id' => ['required', 'integer'],
            'attachments.*' => ['nullable', File::types('pdf')->max('10mb')],
            'files_names' => ['nullable', 'array'],
            'registered_at' => ['required', 'date'],
            'expired_at' => ['required', 'date'],
            'sender_id' => ['required', 'integer'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'título',
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
            'analyzed_by' => auth()->id(),
            'analyst_id' => auth()->id(),
            'customer_id' => $this->project->customer_id,
            'registered_at' => date('Y-m-d H:i:s'),
            'expired_at' => "{$this->date_limit} {$this->hour}:00",
            'sender_id' => SenderEnum::PROFESSIONAL->value,
            'message' => "Diligência <strong>registrada</strong> com sucesso!",
        ]);
    }
}
