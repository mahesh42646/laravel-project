<?php

namespace App\Models\Project;

use App\Casts\MaskMoney;
use App\Enums\Project\Diligence\StatusEnum as DiligenceStatusEnum;
use App\Enums\Project\DocumentStatusEnum;
use App\Enums\Project\IdentificationEnum;
use App\Enums\Project\ProfileEnum;
use App\Enums\Project\ProfilePriorityEnum;
use App\Enums\Project\IdentificationProjectStatusEnum;
use App\Enums\Project\StatusEnum;
use App\Enums\Project\SubscribeStatusEnum;
use App\Enums\Shared\BooleanEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Customer\Customer;
use App\Models\Edital\AgtentType;
use App\Models\Edital\Edital;
use App\Models\Project\Accessibility\Accessibility;
use App\Models\Project\Accessibility\Arquitetonic;
use App\Models\Project\Accessibility\Atitudinal;
use App\Models\Project\Accessibility\Communicational;
use App\Models\Project\AnalyzeComplement\AnalyzeComplement;
use App\Models\Project\AnalyzeDocument\AnalyzeDocument;
use App\Models\Project\AnalyzeDocument\Document;
use App\Models\Project\Diligence\Diligence;
use App\Models\Project\IdentificationProject\Accessibility\IdentificationProjectAccessibility;
use App\Models\Project\IdentificationProject\Category\IdentificationProjectCategory;
use App\Models\Project\IdentificationProject\Cronogram\IdentificationProjectCronogram;
use App\Models\Project\IdentificationProject\Description\IdentificationProjectDescription;
use App\Models\Project\IdentificationProject\Identification\IdentificationProject;
use App\Models\Project\IdentificationProject\Justification\IdentificationProjectJustification;
use App\Models\Project\IdentificationProject\Name\IdentificationProjectName;
use App\Models\Project\IdentificationProject\Objective\IdentificationProjectObjective;
use App\Models\Project\IdentificationProject\Plan\IdentificationProjectPlan;
use App\Models\Project\IdentificationProject\Price\IdentificationProjectPrice;
use App\Models\Project\IdentificationProject\Resume\IdentificationProjectResume;
use App\Models\Project\IdentificationProject\Target\IdentificationProjectTarget;
use App\Models\Project\IdentificationProponent\IdentificationProponent;
use App\Models\Project\InscriptionProject\InscriptionProject;
use App\Models\SuperAdmin\Tenant\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;

final class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'edital_id',
        'customer_id',

        'inscription_has_quota',
        'inscription_quota_id',
        'inscription_profile_id',
        'inscription_profile_priority_id',
        'inscription_profile_priority_other',
        'inscription_accessibility_other',
        'inscription_accessibility_arquitetonic_other',
        'inscription_accessibility_communicational_other',
        'inscription_accessibility_atitudinal_other',
        'inscription_accessibility_description',
        'inscription_local_execution',
        'inscription_local_execution_started_at',
        'inscription_local_execution_finished_at',
        'inscription_strategy_description',

        'trajectory_main_actions',
        'trajectory_initial',
        'trajectory_other_actions',

        'identification_category_id',
        'identification_category_status_id',
        'identification_name',
        'identification_name_status_id',
        'identification_price',
        'identification_price_status_id',
        'identification_resume',
        'identification_resume_status_id',
        'identification_description',
        'identification_description_status_id',
        'identification_objective',
        'identification_objective_status_id',
        'identification_justification',
        'identification_justification_status_id',
        'identification_target',
        'identification_target_status_id',
        'identification_cronogram',
        'identification_cronogram_status_id',
        'identification_accessibility',
        'identification_accessibility_status_id',
        'identification_plan',
        'identification_plan_status_id',
        'identification_contrapartid_social',
        'identification_contrapartid_social_status_id',
        'identification_local',
        'identification_local_status_id',

        'note',
        'status',
        'subscribe_status',
        'is_selected',
        'is_enabled',
        'is_substitute',
        'agent_type_id',
        'motive',
        'tenant_id',
        'sended_at',
    ];

    protected function casts(): array
    {
        return [
            'inscription_has_quota' => BooleanEnum::class,
            'inscription_profile_id' => ProfileEnum::class,
            'inscription_profile_priority_id' => ProfilePriorityEnum::class,
            'inscription_local_execution_started_at' => 'date',
            'inscription_local_execution_finished_at' => 'date',

            'identification_category_status_id' => IdentificationEnum::class,
            'identification_name_status_id' => IdentificationEnum::class,
            'identification_price_masked' => MaskMoney::class.':identification_price',
            'identification_price_status_id' => IdentificationEnum::class,
            'identification_resume_status_id' => IdentificationEnum::class,
            'identification_description_status_id' => IdentificationEnum::class,
            'identification_objective_status_id' => IdentificationEnum::class,
            'identification_justification_status_id' => IdentificationEnum::class,
            'identification_target_status_id' => IdentificationEnum::class,
            'identification_cronogram_status_id' => IdentificationEnum::class,
            'identification_accessibility_status_id' => IdentificationEnum::class,
            'identification_plan_status_id' => IdentificationEnum::class,
            'identification_contrapartid_social_status_id' => IdentificationEnum::class,
            'identification_local_status_id' => IdentificationEnum::class,

            'sended_at' => 'datetime',
            'open_at' => 'date',
            'closed_at' => 'date',
            'status' => StatusEnum::class,
            'subscribe_status' => SubscribeStatusEnum::class,
            'is_selected' => BooleanEnum::class,
            'is_enabled' => BooleanEnum::class,
            'is_substitute' => BooleanEnum::class,
        ];
    }

    // MODEL BINDING CUSTOM

    public function resolveRouteBinding($value, $field = null)
    {
        if (session('tenant_id')) {
            $project = $this->where('id', $value)
                ->where('tenant_id', session('tenant_id'))
                ->first();
            
            if (! $project) {
                return abort(403);
            }

            return $project;
        }

        return $this->where('id', $value)->firstOrFail();
    }

    // METHODS

    public static function saveFiles(Request $request, Project $project): void
    {
        $payloads = [];

        foreach ($request->documents as $index => $document) {
            $filePath = $document->storeAs(
                path: "projects/{$project->id}", 
                name: Str::random(32).'.'.$document->extension(), 
                options: 'public',
            );

            $payloads[] = [
                'project_id' => $project->id,
                'document_id' => $request->documents_types[$index],
                'path' => $filePath,
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }

        DB::table('project_documents')->insert($payloads);
    }

    public function getStatusGeneral(): string
    {
        if (
            $this->identification_project_status === IdentificationProjectStatusEnum::APPROVED &&
            $this->getDocumentStatus() === DocumentStatusEnum::APPROVED
        ) {
            return 'approved';
        }

        return 'pending';
    }

    public function isDiligencesApproveds(): bool
    {
        $totalAvailables = $this->diligences->count();
        $totalDiligencesApproveds = 0;

        foreach ($this->diligences as $diligence) {
            if ($diligence->status === DiligenceStatusEnum::APPROVED) {
                $totalDiligencesApproveds++;
            }
        }

        return ($totalAvailables === $totalDiligencesApproveds);
    }

    private function getDocumentStatus(): DocumentStatusEnum
    {
        $pendings = $approveds = $total = 0;

        foreach ($this->documents() as $document) {
            match ($document->status->id) {
                1 => ++$approveds,
                default => ++$pendings,
            };

            ++$total;
        }

        return match (true) {
            $approveds === $total => DocumentStatusEnum::APPROVED,
            default => DocumentStatusEnum::PENDING,
        };
    }

    public function getDocumentStatusIcon(): string
    {
        $pendings = $approveds = $repproveds = $reanalyzeds = $total = 0;

        foreach ($this->documents() as $document) {
            match ($document->status->id) {
                0 => ++$pendings,
                1 => ++$approveds,
                2 => ++$repproveds,
                3 => ++$reanalyzeds,
                default => ++$pendings,
            };

            ++$total;
        }

        if ($pendings === $total) {
            return <<<HTML
                <svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 -960 960 960" width="25" fill="#ffae1f">
                    <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                </svg>
            HTML;
        }

        if ($approveds === $total) {
            return <<<HTML
                <svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 -960 960 960" width="25" fill="#34c38f">
                    <path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                </svg>
            HTML;
        }

        if ($repproveds === $total) {
            return <<<HTML
                <svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 -960 960 960" width="25" fill="#ff002e">
                    <path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                </svg>
            HTML;
        }

        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 -960 960 960" width="25" fill="#ffae1f">
                <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
            </svg>
        HTML;
    }

    public static function getAll(): object
    {
        $projects = DB::select(
            "SELECT
                SUM(IF(projects.status = 1, 1, 0)) AS finished,
                SUM(IF(projects.status = 3, 1, 0)) AS classified,
                SUM(IF(projects.status = 2, 1, 0)) AS repproved
            FROM projects
            WHERE tenant_id = ?", [session('tenant_id')]
        );

        return (object) [
            'finished' => $projects[0]->finished,
            'classified' => $projects[0]->classified,
            'repproved' => $projects[0]->repproved,
        ];
    }

    public function documents(): array
    {
        $payloads = [];
        $documents = DB::select(
            "SELECT 
                id, document_id AS type, path, 
                status, motive, is_required, expired_at
            FROM project_documents
            WHERE project_id = ?", [$this->id]
        );

        foreach ($documents as $document) {
            $payloads[] = (object) [
                'id' => $document->id,
                'type' => $document->type,
                'name' => DocumentStatusEnum::tryFrom($document->type)?->getName(),
                'path' => $document->path ? "storage/{$document->path}" : '',
                'status' => (object) [
                    'id' => $document->status,
                    'icon' => DocumentStatusEnum::tryFrom($document->status)?->getIcon(),
                    'name' => DocumentStatusEnum::tryFrom($document->status)?->getName(),
                ],
                'motive' => $document->motive,
                'is_required' => $document->is_required ? true : false,
                'expired_at' => $document->expired_at,
            ];
        }

        return $payloads;
    }

    // RELATIONSHIPS

    public function edital(): BelongsTo
    {
        return $this->belongsTo(
            related: Edital::class,
            foreignKey: 'edital_id',
        );
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(
            related: Customer::class, 
            foreignKey: 'customer_id',
        );
    }

    public function inscription_accessibilities(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Accessibility::class,
            table: 'project_inscription_accessibility',
            foreignPivotKey: 'project_id',
            relatedPivotKey: 'accessibility_id',
        );
    }

    public function inscription_accessibility_arquitetonics(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Arquitetonic::class,
            table: 'project_inscription_accessibility_arquitetonic',
            foreignPivotKey: 'project_id',
            relatedPivotKey: 'accessibility_arquitetonic_id',
        );
    }

    public function inscription_accessibility_communicationals(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Communicational::class,
            table: 'project_inscription_accessibility_communicational',
            foreignPivotKey: 'project_id',
            relatedPivotKey: 'accessibility_communicational_id',
        );
    }

    public function inscription_accessibility_atitudinals(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Atitudinal::class,
            table: 'project_inscription_accessibility_atitudinal',
            foreignPivotKey: 'project_id',
            relatedPivotKey: 'accessibility_atitudinal_id',
        );
    }

    public function inscription_strategies(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Strategy::class,
            table: 'project_inscription_strategy',
            foreignPivotKey: 'project_id',
            relatedPivotKey: 'strategy_id',
        );
    }

    public function identification_category(): BelongsTo
    {
        return $this->belongsTo(
            related: Category::class,
            foreignKey: 'identification_category_id',
        );
    }

    public function proponent_analyzed_by(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'identification_proponent_status_analyzed_by',
        );
    }

    public function inscription_project_analyzed_by(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'inscription_project_status_analyzed_by',
        );
    }

    public function project_analyzed_by(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'identification_project_status_analyzed_by',
        );
    }

    public function files(): HasMany
    {
        return $this->hasMany(
            related: Document::class,
            foreignKey: 'project_id',
        );
    }

    public function agent_type(): BelongsTo
    {
        return $this->belongsTo(
            related: AgtentType::class,
            foreignKey: 'agent_type_id',
        );
    }
    
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(
            related: Tenant::class,
            foreignKey: 'tenant_id',
        );
    }

    public function inscription_quota(): BelongsTo
    {
        return $this->belongsTo(
            related: Tenant::class,
            foreignKey: 'inscription_quota_id',
        );
    }

    public function diligences(): HasMany
    {
        return $this->hasMany(
            related: Diligence::class,
            foreignKey: 'project_id',
        );
    }

    public function identification_proponent(): HasOne
    {
        return $this->hasOne(
            related: IdentificationProponent::class,
            foreignKey: 'project_id',
        );
    }

    public function inscription_project(): HasOne
    {
        return $this->hasOne(
            related: InscriptionProject::class,
            foreignKey: 'project_id',
        );
    }

    // IDENTIFICACAO DO PROJETO

    public function identification_project(): HasOne
    {
        return $this->hasOne(
            related: IdentificationProject::class,
            foreignKey: 'project_id',
        );
    }

    public function identification_project_category(): HasOne
    {
        return $this->hasOne(
            related: IdentificationProjectCategory::class,
            foreignKey: 'project_id',
        );
    }

    public function identification_project_name(): HasOne
    {
        return $this->hasOne(
            related: IdentificationProjectName::class,
            foreignKey: 'project_id',
        );
    }

    public function identification_project_price(): HasOne
    {
        return $this->hasOne(
            related: IdentificationProjectPrice::class,
            foreignKey: 'project_id',
        );
    }

    public function identification_project_resume(): HasOne
    {
        return $this->hasOne(
            related: IdentificationProjectResume::class,
            foreignKey: 'project_id',
        );
    } 

    public function identification_project_description(): HasOne
    {
        return $this->hasOne(
            related: IdentificationProjectDescription::class,
            foreignKey: 'project_id',
        );
    }

    public function identification_project_objective(): HasOne
    {
        return $this->hasOne(
            related: IdentificationProjectObjective::class,
            foreignKey: 'project_id',
        );
    }

    public function identification_project_justification(): HasOne
    {
        return $this->hasOne(
            related: IdentificationProjectJustification::class,
            foreignKey: 'project_id',
        );
    }

    public function identification_project_target(): HasOne
    {
        return $this->hasOne(
            related: IdentificationProjectTarget::class,
            foreignKey: 'project_id',
        );
    }

    public function identification_project_cronogram(): HasOne
    {
        return $this->hasOne(
            related: IdentificationProjectCronogram::class,
            foreignKey: 'project_id',
        );
    }

    public function identification_project_accessibility(): HasOne
    {
        return $this->hasOne(
            related: IdentificationProjectAccessibility::class,
            foreignKey: 'project_id',
        );
    }

    public function identification_project_plan(): HasOne
    {
        return $this->hasOne(
            related: IdentificationProjectPlan::class,
            foreignKey: 'project_id',
        );
    }

    public function identification_project_contrapartid_social(): HasOne
    {
        return $this->hasOne(
            related: IdentificationProjectPlan::class,
            foreignKey: 'project_id',
        );
    }

    public function identification_project_local(): HasOne
    {
        return $this->hasOne(
            related: IdentificationProjectPlan::class,
            foreignKey: 'project_id',
        );
    }

    // ANALISE DE DOCUMENTOS E COMPLEMENTOS

    public function analyze_document(): HasOne
    {
        return $this->hasOne(
            related: AnalyzeDocument::class,
            foreignKey: 'project_id',
        );
    }

    public function analyze_complement(): HasOne
    {
        return $this->hasOne(
            related: AnalyzeComplement::class,
            foreignKey: 'project_id',
        );
    }
}
