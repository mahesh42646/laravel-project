<?php

namespace App\Services\Project;

use App\Enums\Project\SubscribeStatusEnum;
use App\Models\Project\Project;

final class StatusService
{
    public function getPayload(Project $project): object|null
    {
        $payload = [];

        if ($project->subscribe_status === SubscribeStatusEnum::PENDING) {
            return null;
        }

        $identificationProponent = $project->identification_proponent;
        $payload['agent_registration_status'] = $identificationProponent->status->getName();
        $payload['agent_registration_status_updated_at'] = $identificationProponent->updated_at->format('d/m/Y H:i:s');

        $inscriptionProject = $project->inscription_project;
        $payload['agent_inscription_project_status'] = $inscriptionProject->status->getName();
        $payload['agent_inscription_project_status_updated_at'] = $inscriptionProject->updated_at->format('d/m/Y H:i:s');

        $identificationProject = $project->identification_project;
        $payload['agent_identification_project_status'] = $identificationProject->status->getName();
        $payload['agent_identification_project_status_updated_at'] = $identificationProject->updated_at->format('d/m/Y H:i:s');

        $files = $project->analyze_document;
        $payload['agent_files_status'] = $files->status->getName();
        $payload['agent_files_status_updated_at'] = $files->updated_at->format('d/m/Y H:i:s');

        $complements = $project->analyze_complement;
        $payload['agent_complements_status'] = $complements->status->getName();
        $payload['agent_complements_status_updated_at'] = $complements->updated_at->format('d/m/Y H:i:s');

        return (object) $payload;
    }
}
