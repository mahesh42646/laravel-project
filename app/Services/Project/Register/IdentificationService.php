<?php

namespace App\Services\Project\Register;

use App\Enums\Project\Analyze\AnalyzeStatusEnum;
use App\Enums\Project\Analyze\TimelineStatusEnum;
use App\Models\Edital\Edital;
use App\Models\Project\Project;
use Illuminate\Http\Request;

final class IdentificationService
{
    public function payload(Project $project): object
    {
        $edital = $project->edital;
        $fieldsRequireds = $this->getIdsFromFieldsIdentification($edital);

        return (object) [
            'edital' => $edital,
            'identifications' => $this->getContainers($fieldsRequireds),
            'is_requireds' => array_values($fieldsRequireds),
        ];
    }

    private function getIdsFromFieldsIdentification(Edital $edital): array
    {
        $identifications = $edital->identifications;

        return array_combine(
            $identifications->pluck('id')->toArray(),
            $identifications->pluck('pivot.is_required')->toArray()
        );
    }

    private function getContainers(array $projectIdentification): array
    {
        return [
            ['selector' => '[data-category-container]', 'title' => 'CATEGORIA DO PROJETO', 'is_required' => $projectIdentification[1]],
            ['selector' => '[data-name-container]', 'title' => 'NOME DO PROJETO', 'is_required' => $projectIdentification[2]],
            ['selector' => '[data-price-container]', 'title' => 'VALOR DO PROJETO', 'is_required' => $projectIdentification[3]],
            ['selector' => '[data-resume-container]', 'title' => 'RESUMO DA PROPOSTA', 'is_required' => $projectIdentification[4]],
            ['selector' => '[data-description-container]', 'title' => 'DESCRIÇÃO DA PROPOSTA', 'is_required' => $projectIdentification[5]],
            ['selector' => '[data-objective-container]', 'title' => 'OBJETIVOS E METAS', 'is_required' => $projectIdentification[6]],
            ['selector' => '[data-justification-container]', 'title' => 'JUSTIFICATIVA', 'is_required' => $projectIdentification[7]],
            ['selector' => '[data-target-container]', 'title' => 'PÚBLICO-ALVO', 'is_required' => $projectIdentification[8]],
            ['selector' => '[data-cronogram-container]', 'title' => 'CRONOGRAMA DE EXECUÇÃO', 'is_required' => $projectIdentification[9]],
            ['selector' => '[data-accessibility-container]', 'title' => 'MEDIDAS DE ACESSIBILIDADE', 'is_required' => $projectIdentification[10]],
            ['selector' => '[data-plan-container]', 'title' => 'PLANO DE DIVULGAÇÃO', 'is_required' => $projectIdentification[11]],
            ['selector' => '[data-contrapartid-social-container]', 'title' => 'CONTRAPARTIDA SOCIAL', 'is_required' => $projectIdentification[12]],
            ['selector' => '[data-local-container]', 'title' => 'LOCAIS PREVISTOS PARA REALIZAÇÃO DA AÇÃO CULTURAL', 'is_required' => $projectIdentification[13]],
        ];
    }

    public function update(Project $project, Request $request): void
    {
        if ($request->identification_category_id) {
            $this->saveHistory($project->identification_project_category(), $project, $request);
        }

        if ($request->identification_name) {
            $this->saveHistory($project->identification_project_name(), $project, $request);
        }

        $project->update($request->except('customer_id'));
    }

    private function saveHistory($identificationProject, $project, $request): void
    {
        $identification = $identificationProject
            ->updateOrCreate(['project_id' => $project->id], [
                'status' => AnalyzeStatusEnum::PENDING,
                'customer_id' => $request->customer_id,
            ]);

        if ($identification->timelines->isEmpty()) {
            $identification->timelines()->create([
                'status' => TimelineStatusEnum::SENT,
                'customer_id' => $request->customer_id,
            ]);
        } else {
            $identification->timelines()->create([
                'status' => TimelineStatusEnum::UPDATED,
                'customer_id' => $request->customer_id,
            ]);
        }
    }
}
