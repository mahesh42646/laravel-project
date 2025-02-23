<?php

namespace App\Http\Requests\Project\Tabs\InscriptionProject;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\Project\InscriptionProjectStatusEnum as Status;
use Illuminate\Support\Facades\Auth;

final class ApprovedRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'motive' => ['nullable', 'max:65000'],
        ];
    }

    public function payload(Status $status): array
    {
        return [
            'inscription_project_status' => $status,
            'inscription_project_status_motive' => '',
            'inscription_project_status_analyzed_by' => Auth::id(),
            'inscription_project_status_expired_at' => null,
            'inscription_project_status_updated_at' => date('Y-m-d H:i:s'),
        ];
    }

    public function message(): string
    {
        return "Inscrição do projeto <strong>aprovada com sucesso!</strong>";
    }
}
