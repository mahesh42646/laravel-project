<?php

namespace App\Services\Agent;

use App\Enums\Edital\TypeEnum;
use App\Enums\Project\Analyze\AnalyzeStatusEnum;
use App\Enums\Project\Analyze\TimelineStatusEnum;
use App\Enums\Project\SubscribeStatusEnum;
use App\Models\Edital\Edital;
use App\Models\Project\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

final class InscriptionProjectService
{
    public function createProject(string $editalCode, Request $request): Project
    {
        $customer = session("customer_auth_{$request['customer_id']}");
        $edital = Edital::findOrFail(base64_decode($editalCode));

        $project = Project::create([
            'edital_id' => $edital->id,
            'customer_id' => $customer->id,
            'subscribe_status' => SubscribeStatusEnum::PENDING,
            'agent_type_id' => $customer->type_agent_id->value,
            'tenant_id' => $edital->tenant_id,
        ]);

        $identificationProponent = $project->identification_proponent()->create([
            'status' => AnalyzeStatusEnum::PENDING,
            'customer_id' => $customer->id,
        ]);

        $identificationProponent->timelines()->create([
            'status' => TimelineStatusEnum::SENT,
            'customer_id' => $customer->id,
        ]);

        $inscriptionProject = $project->inscription_project()->create([
            'status' => AnalyzeStatusEnum::PENDING,
            'customer_id' => $customer->id,
        ]);

        $inscriptionProject->timelines()->create([
            'status' => TimelineStatusEnum::SENT,
            'customer_id' => $customer->id,
        ]);

        if ($edital->type_id === TypeEnum::NORMAL) {
            $project->inscription_accessibilities()->sync($request->accessibilities);
            $project->inscription_accessibility_arquitetonics()->sync($request->accessibility_arquitetonics);
            $project->inscription_accessibility_communicationals()->sync($request->accessibility_communicationals);
            $project->inscription_accessibility_atitudinals()->sync($request->accessibility_atitudinals);
            $project->inscription_strategies()->sync($request->strategies);
        }

        return $project;
    }

    public function saveDocuments(Project $project): void
    {   
        $payloads = [];
        $documents = DB::select(
            "SELECT
                document_types.id AS code,
                edital_documents.is_required
            FROM edital_documents
            INNER JOIN edital_document_types AS document_types
            ON edital_documents.document_id = document_types.id
            INNER JOIN edital_agent_types AS agent_types
            ON document_types.people_type_id = agent_types.people_type_id
            WHERE edital_documents.edital_id = ? AND agent_types.id = ?", [
                $project->edital_id,
                $project->agent_type_id,
            ]
        );

        foreach ($documents as $document) {
            $payloads[] = [
                'project_id' => $project->id,
                'document_id' => $document->code,
                'created_at' => date('Y-m-d H:i:s'),
                'is_required' => $document->is_required,
            ];
        }

        DB::table('project_documents')->insert($payloads);
    }
}
