<?php

namespace App\Services\Notification;

use App\Enums\Notification\TypeStatusEnum as TypeStatus;
use App\Models\Notification\Notification;
use App\Models\Project\Project;
use Illuminate\Support\Facades\Auth;

final class NotificationService
{
    public function toProponent(Project $project, TypeStatus $status): void
    {
        Notification::create([
            'title' => $this->messageProponent($status),
            'type_id' => $status,
            'project_id' => $project->id,
            'from_user_id' => Auth::id(),
            'to_customer_id' => $project->customer_id,
        ]);
    }

    public function toInscriptionProject(Project $project, TypeStatus $status): void
    {
        Notification::create([
            'title' => $this->messageInscriptionProject($status),
            'type_id' => $status,
            'project_id' => $project->id,
            'from_user_id' => Auth::id(),
            'to_customer_id' => $project->customer_id,
        ]);
    }

    public function toIdentificationProject(Project $project, TypeStatus $status): void
    {
        Notification::create([
            'title' => $this->messageIdentificationProject($status),
            'type_id' => $status,
            'project_id' => $project->id,
            'from_user_id' => Auth::id(),
            'to_customer_id' => $project->customer_id,
        ]);
    }

    public function toDocument(Project $project, TypeStatus $status): void
    {
        Notification::create([
            'title' => $this->messageDocument($status),
            'type_id' => $status,
            'project_id' => $project->id,
            'from_user_id' => Auth::id(),
            'to_customer_id' => $project->customer_id,
        ]);
    }

    public function toComplement(Project $project, TypeStatus $status): void
    {
        Notification::create([
            'title' => $this->messagComplement($status),
            'type_id' => $status,
            'project_id' => $project->id,
            'from_user_id' => Auth::id(),
            'to_customer_id' => $project->customer_id,
        ]);
    }

    private function messageProponent(TypeStatus $status): string
    {
        $createdAt = date('d/m/Y H:i');
        $analyst = Auth::user()->name;
        $motive = request()->motive ?: '';

        return match ($status->value) {
            TypeStatus::APPROVED->value => "<strong>Parabéns!</strong> Seus dados pessoais foram analisados e <strong>aprovados</strong> pelo Analista {$analyst} em {$createdAt}",
            TypeStatus::REPPROVED->value => "<strong>Não foi dessa vez!</strong> Seus dados pessoais foram analisados e <strong>reprovados</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
            default => "<strong>Reanálise!</strong> Seus dados pessoais foram para <strong>reanálise</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
        };
    }

    private function messageIdentificationProject(TypeStatus $status): string
    {
        $createdAt = date('d/m/Y H:i');
        $analyst = Auth::user()->name;
        $motive = request()->motive ?: '';

        return match ($status->value) {
            TypeStatus::APPROVED->value => "<strong>Parabéns!</strong> Os dados de identificação do seu projeto foram analisados e <strong>aprovados</strong> pelo Analista {$analyst} em {$createdAt}",
            TypeStatus::REPPROVED->value => "<strong>Não foi dessa vez!</strong> Os dados de identificação do seu projeto foram analisados e <strong>reprovados</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
            default => "<strong>Reanálise!</strong> Os dados de identificação do seu projeto foram para <strong>reanálise</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
        };
    }

    private function messageDocument(TypeStatus $status): string
    {
        $createdAt = date('d/m/Y H:i');
        $analyst = Auth::user()->name;
        $motive = request()->motive ?: '';

        return match ($status->value) {
            TypeStatus::APPROVED->value => "<strong>Parabéns!</strong> O(s) arquivo(s) foram analisados e <strong>aprovados</strong> pelo Analista {$analyst} em {$createdAt}",
            TypeStatus::REPPROVED->value => "<strong>Não foi dessa vez!</strong> O(s) arquivo(s) foram analisados e <strong>reprovados</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
            default => "<strong>Reanálise!</strong> O(s) arquivo(s) foram para <strong>reanálise</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
        };
    }

    private function messagComplement(TypeStatus $status): string
    {
        $createdAt = date('d/m/Y H:i');
        $analyst = Auth::user()->name;
        $motive = request()->motive ?: '';

        return match ($status->value) {
            TypeStatus::APPROVED->value => "<strong>Parabéns!</strong> os links complemenares foram analisados e <strong>aprovados</strong> pelo Analista {$analyst} em {$createdAt}",
            TypeStatus::REPPROVED->value => "<strong>Não foi dessa vez!</strong> os links complemenares foram analisados e <strong>reprovados</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
            default => "<strong>Reanálise!</strong> os links complemenares foram para <strong>reanálise</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
        };
    }

    private function messageInscriptionProject(TypeStatus $status): string
    {
        $createdAt = date('d/m/Y H:i');
        $analyst = Auth::user()->name;
        $motive = request()->motive ?: '';

        return match ($status->value) {
            TypeStatus::APPROVED->value => "<strong>Parabéns!</strong> A inscrição do seu projeto foi analisada e <strong>aprovada</strong> pelo Analista {$analyst} em {$createdAt}",
            TypeStatus::REPPROVED->value => "<strong>Não foi dessa vez!</strong> A inscrição do seu projeto foi analisada e <strong>reprovada</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
            default => "<strong>Reanálise!</strong> Os dados da inscrição do seu projeto foram para <strong>reanálise</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
        };
    }
}
