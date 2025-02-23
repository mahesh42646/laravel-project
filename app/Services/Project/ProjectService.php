<?php

namespace App\Services\Project;

use App\Enums\Customer\CommunityTraditionalEnum;
use App\Enums\Customer\MainAreaAtuationEnum;
use App\Enums\Project\Analyze\AnalyzeStatusEnum;
use App\Enums\Shared\BreedEnum;
use App\Enums\Shared\GenderEnum;
use App\Enums\Shared\SchoolingEnum;
use App\Helpers\Fill;
use App\Models\Project\Project;
use Illuminate\Support\Facades\DB;
use DateTime;

class ProjectService
{
    public function checkStatusExpiredAt(Project $project): bool
    {
        if ($project->identification_project_status_expired_at) {
            $now = new DateTime();
            $expiredAt = new DateTime($project->identification_project_status_expired_at);

            if ($now > $expiredAt) {
                return true;
            }
        }

        return false;
    }

    public function checkStatusApproved(Project $project): bool
    {
        return (
            $project->identification_proponent->status === AnalyzeStatusEnum::APPROVED &&
            $project->inscription_project->status === AnalyzeStatusEnum::APPROVED &&
            $project->identification_project->status === AnalyzeStatusEnum::APPROVED &&
            $project->analyze_document->status === AnalyzeStatusEnum::APPROVED &&
            $project->analyze_complement->status === AnalyzeStatusEnum::APPROVED
        );
    }

    public function searchByCustomerCpf($value): array
    {
        $cpfMasked = Fill::maskCpf($value);
        $customer = DB::select(
            "SELECT
                id, name, name_social, cpf, cnpj, 
                company_name, rg, gender_id,
                breed_id, is_lgbt, schooling_id,
                income, area_atuation_id, area_atuation_other,
                community_traditional_id, city, address,
                phone, email, type
            FROM customers
            WHERE cpf = ? AND is_active = 1 
            AND type = 'PF' AND tenant_id = ?
            LIMIT 1", [$cpfMasked, session('tenant_id')]
        );

        if (count($customer) <= 0) {
            return [];
        }

        return [
            'id' => $customer[0]->id,
            'name' => $customer[0]->name,
            'name_social' => $customer[0]->name_social ?: '',
            'cpf' => $customer[0]->cpf,
            'cnpj' => $customer[0]->cnpj ?: '',
            'company_name' => $customer[0]->company_name ?: '',
            'rg' => $customer[0]->rg,
            'gender' => GenderEnum::tryFrom($customer[0]->gender_id)?->getName(),
            'breed' => BreedEnum::tryFrom($customer[0]->breed_id)?->getName(),
            'is_lgbt' => $customer[0]->is_lgbt == '1' ? 'Sim' : 'Não',
            'schooling' => SchoolingEnum::tryFrom($customer[0]->schooling_id)?->getName(),
            'income' => 'R$ ' . number_format($customer[0]->income, 2, ',', '.'),
            'area_atuation' => MainAreaAtuationEnum::tryFrom($customer[0]->area_atuation_id)?->getName(),
            'area_atuation_other' => $customer[0]->area_atuation_other ?: '',
            'community_traditional' => CommunityTraditionalEnum::tryFrom($customer[0]->community_traditional_id)?->getName(),
            'city' => $customer[0]->city,
            'address' => $customer[0]->address ?: '',
            'phone' => $customer[0]->phone,
            'email' => $customer[0]->email,
            'type' => $customer[0]->type,
        ];
    }

    public function searchByCustomerCnpj($value): array
    {
        $cnpjMasked = Fill::maskCnpj($value);
        $customer = DB::select(
            "SELECT * FROM customers
            WHERE cnpj = ? AND is_active = 1 
            AND type = 'PJ' AND tenant_id = ?
            LIMIT 1", [$cnpjMasked, session('tenant_id')]
        );

        if (count($customer) <= 0) {
            return [];
        }

        return [
            'id' => $customer[0]->id,
            'name' => $customer[0]->name,
            'name_social' => $customer[0]->name_social ?: '',
            'cpf' => $customer[0]->cpf,
            'cnpj' => $customer[0]->cnpj ?: '',
            'company_name' => $customer[0]->company_name ?: '',
            'rg' => $customer[0]->rg,
            'gender' => GenderEnum::tryFrom($customer[0]->gender_id)?->getName(),
            'breed' => BreedEnum::tryFrom($customer[0]->breed_id)?->getName(),
            'is_lgbt' => $customer[0]->is_lgbt == '1' ? 'Sim' : 'Não',
            'schooling' => SchoolingEnum::tryFrom($customer[0]->schooling_id)?->getName(),
            'income' => 'R$ ' . number_format($customer[0]->income, 2, ',', '.'),
            'area_atuation' => $customer[0]->area_atuation,
            'area_atuation_other' => $customer[0]->area_atuation_other ?: '',
            'community_traditional' => $customer[0]->community_traditional ?: '',
            'city' => $customer[0]->city,
            'address' => $customer[0]->address ?: '',
            'phone' => $customer[0]->phone,
            'email' => $customer[0]->email,
            'type' => $customer[0]->type,
        ];
    }

    public function searchByFile(string $editalId, string $type): array
    {
        $payloads = [];
        $files = DB::select(
            "SELECT document_id
            FROM edital_documents
            WHERE edital_id = ? AND type = ?", [$editalId, $type]
        );

        if (count($files) <= 0) {
            return [];
        }

        foreach ($files as $file) {
            $payloads[] = [
                'id' => $file->document_id,
                'name' => 'Documento',
            ];
        }

        return $payloads;
    }
}
