<?php

namespace App\Services\Notification;

use App\Enums\Notification\TypeStatusEnum as TypeStatus;
use App\Models\Notification\Notification;
use App\Models\Project\Project;
use Illuminate\Support\Facades\Auth;

final class NotificationIdentificationProjectService
{
    public function toAgent(Project $project, TypeStatus $status, string $category): void
    {
        Notification::create([
            'title' => $this->message($status, $category),
            'type_id' => $status,
            'project_id' => $project->id,
            'from_user_id' => Auth::id(),
            'to_customer_id' => $project->customer_id,
        ]);
    }

    private function message(TypeStatus $status, $category): string
    {
        $createdAt = date('d/m/Y H:i');
        $analyst = Auth::user()->name;
        $motive = request()->motive ?: '';

        if ($category === 'category') {
            return match ($status->value) {
                TypeStatus::APPROVED->value => "<strong>Parabéns!</strong> Os dados da categoria da inscrição do seu projeto foram analisados e <strong>aprovados</strong> pelo Analista {$analyst} em {$createdAt}",
                TypeStatus::REPPROVED->value => "<strong>Não foi dessa vez!</strong> Os dados da categoria da inscrição do seu projeto foram analisados e <strong>reprovados</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
                default => "<strong>Reanálise!</strong> Os dados da categoria da inscrição do seu projeto foram para <strong>reanálise</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
            };
        }

        if ($category === 'name') {
            return match ($status->value) {
                TypeStatus::APPROVED->value => "<strong>Parabéns!</strong> Os dados do nome da inscrição do seu projeto foram analisados e <strong>aprovados</strong> pelo Analista {$analyst} em {$createdAt}",
                TypeStatus::REPPROVED->value => "<strong>Não foi dessa vez!</strong> Os dados do nome da inscrição do seu projeto foram analisados e <strong>reprovados</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
                default => "<strong>Reanálise!</strong> Os dados do nome da inscrição do seu projeto foram para <strong>reanálise</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
            };
        }

        if ($category === 'price') {
            return match ($status->value) {
                TypeStatus::APPROVED->value => "<strong>Parabéns!</strong> Os dados do valor do seu projeto foram analisados e <strong>aprovados</strong> pelo Analista {$analyst} em {$createdAt}",
                TypeStatus::REPPROVED->value => "<strong>Não foi dessa vez!</strong> Os dados do valor do seu projeto foram analisados e <strong>reprovados</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
                default => "<strong>Reanálise!</strong> Os dados do valor do seu projeto foram para <strong>reanálise</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
            };
        }

        if ($category === 'resume') {
            return match ($status->value) {
                TypeStatus::APPROVED->value => "<strong>Parabéns!</strong> Os dados de resumo do seu projeto foram analisados e <strong>aprovados</strong> pelo Analista {$analyst} em {$createdAt}",
                TypeStatus::REPPROVED->value => "<strong>Não foi dessa vez!</strong> Os dados do resumo de seu projeto foram analisados e <strong>reprovados</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
                default => "<strong>Reanálise!</strong> Os dados do resumo de seu projeto foram para <strong>reanálise</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
            };
        }

        if ($category === 'justification') {
            return match ($status->value) {
                TypeStatus::APPROVED->value => "<strong>Parabéns!</strong> Os dados da justificativa do seu projeto foram analisados e <strong>aprovados</strong> pelo Analista {$analyst} em {$createdAt}",
                TypeStatus::REPPROVED->value => "<strong>Não foi dessa vez!</strong> Os dados da justificativa de seu projeto foram analisados e <strong>reprovados</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
                default => "<strong>Reanálise!</strong> Os dados da justificativa de seu projeto foram para <strong>reanálise</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
            };
        }

        if ($category === 'target') {
            return match ($status->value) {
                TypeStatus::APPROVED->value => "<strong>Parabéns!</strong> Os dados do público alvo do seu projeto foram analisados e <strong>aprovados</strong> pelo Analista {$analyst} em {$createdAt}",
                TypeStatus::REPPROVED->value => "<strong>Não foi dessa vez!</strong> Os dados do público alvo de seu projeto foram analisados e <strong>reprovados</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
                default => "<strong>Reanálise!</strong> Os dados do público alvo de seu projeto foram para <strong>reanálise</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
            };
        }

        if ($category === 'accessibility') {
            return match ($status->value) {
                TypeStatus::APPROVED->value => "<strong>Parabéns!</strong> Os dados de medidas de acessibilidade do seu projeto foram analisados e <strong>aprovados</strong> pelo Analista {$analyst} em {$createdAt}",
                TypeStatus::REPPROVED->value => "<strong>Não foi dessa vez!</strong> Os dados de medidas de acessibilidade de seu projeto foram analisados e <strong>reprovados</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
                default => "<strong>Reanálise!</strong> Os dados de medidas de acessibilidade de seu projeto foram para <strong>reanálise</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
            };
        }

        if ($category === 'plan') {
            return match ($status->value) {
                TypeStatus::APPROVED->value => "<strong>Parabéns!</strong> Os dados do plano de divulgação do seu projeto foram analisados e <strong>aprovados</strong> pelo Analista {$analyst} em {$createdAt}",
                TypeStatus::REPPROVED->value => "<strong>Não foi dessa vez!</strong> Os dados do plano de divulgação de seu projeto foram analisados e <strong>reprovados</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
                default => "<strong>Reanálise!</strong> Os dados do plano de divulgação de seu projeto foram para <strong>reanálise</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
            };
        }

        if ($category === 'local') {
            return match ($status->value) {
                TypeStatus::APPROVED->value => "<strong>Parabéns!</strong> Os dados do local previsto para realização do seu projeto foram analisados e <strong>aprovados</strong> pelo Analista {$analyst} em {$createdAt}",
                TypeStatus::REPPROVED->value => "<strong>Não foi dessa vez!</strong> Os dados do local previsto para realização de seu projeto foram analisados e <strong>reprovados</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
                default => "<strong>Reanálise!</strong> Os dados do local previsto para realização de seu projeto foram para <strong>reanálise</strong> pelo Analista {$analyst} na data {$createdAt}, motivo: {$motive}",
            };
        }

        return '';
    }
}
