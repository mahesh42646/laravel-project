<?php

namespace App\Http\Requests\Project\Tabs\IdentificationProponent;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\Project\ProponentStatusEnum as Status;
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
            'identification_proponent_status' => $status,
            'identification_proponent_status_motive' => '',
            'identification_proponent_status_analyzed_by' => Auth::id(),
            'identification_proponent_status_expired_at' => null,
            'identification_proponent_status_updated_at' => date('Y-m-d H:i:s'),
        ];
    }

    public function message(): string
    {
        return "Inscrição do projeto <strong>aprovada com sucesso!</strong>";
    }
}
