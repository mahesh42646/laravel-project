<?php

namespace App\Services\Notification;

use App\Enums\Notification\TypeStatusEnum as TypeStatus;
use App\Models\Notification\Notification;
use App\Models\Project\Project;
use Illuminate\Support\Facades\Auth;

final class NotificationIFileProjectService
{
    public function toAgent(Project $project, TypeStatus $status, string $documentType): void
    {
        Notification::create([
            'title' => $this->message($status, $documentType),
            'type_id' => $status,
            'project_id' => $project->id,
            'from_user_id' => Auth::id(),
            'to_customer_id' => $project->customer_id,
        ]);
    }

    private function message(TypeStatus $status, string $documentType): string
    {
        $createdAt = date('d/m/Y H:i');
        $analyst = Auth::user()->name;
        $motive = request()->motive ?: '';

        return match ($status->value) {
            TypeStatus::APPROVED->value => "<strong>Parabéns!</strong> Os dados do documento {$documentType} do seu projeto foram analisados e <strong>aprovados</strong> pelo Analista {$analyst} em {$createdAt}",
            TypeStatus::REPPROVED->value => "<strong>Não foi dessa vez!</strong> Os dados do documento {$documentType} para realização de seu projeto foram analisados e <strong>reprovados</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
            default => "<strong>Reanálise!</strong> Os dados do documento {$documentType} foram para <strong>reanálise</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
        };
        
        return '';
    }
}
