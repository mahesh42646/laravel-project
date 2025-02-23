<?php

namespace App\Services\Project;

use App\Models\Project\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

final class SearchService
{
    public function executeFilters(Builder $query):void
    {
        if (request()->has('filter_customer_name')) 
            $query->whereHas('customer', function ($query) {
                $query->where('name', 'like',  '%' . request('filter_customer_name') . '%');
            }
        );

        if (request()->has('filter_edital')) $query->where('edital_id', request('filter_edital'));
        if (request()->has('filter_status')) $query->where('status', request('filter_status'));
        if (request()->has('filter_subscribe')) $query->where('subscribe_status', request('filter_subscribe'));
    }

    public function name(object $customer): string
    {
        return <<<HTML
            <div class="d-flex align-items-center">
                <div>
                    <span class="mr-3">
                        <img src="{$customer->avatar}" class="rounded-circle" width="30px" height="30px" alt="foto de perfil">
                    </span>
                </div>
                <div>
                    <div class="font-weight-bold text-dark">{$customer->name}</div>
                    <div class="text-secondary">{$customer->document_type}:{$customer->document_number}</div>
                </div>
            </div>
        HTML;
    }

    public function edital(Project $project): string
    {
        $projectName = Str::limit($project?->identification_name, 40);
        $editalName = Str::limit($project?->edital?->name, 40) ?: '-';

        return <<<HTML
            <div class="font-weight-bold text-dark text-uppercase">PROJETO: {$projectName}</div>
            <div>{$editalName}</div>
        HTML;
    }

    public function subscriberStatus(Project $project): string
    {
        return <<<HTML
            <span class="d-flex align-items-center">
                {$project->subscribe_status?->getIcon()} 
                <span class="font-weight-medium text-dark ml-2">{$project->subscribe_status?->getName()}</span>
            </span>
        HTML;
    }

    public function status(Project $project): string
    {
        return <<<HTML
            <span class="rounded-lg py-1 pl-1 pr-2" style="border: 1px solid #CCC;">
                {$project->status?->getIcon()}
                <span class="text-dark font-weight-medium pl-1">{$project->status?->getName()}</span>
            </span>
        HTML;
    }

    public function actions(Project $project, object $customer, object|null $status): string
    {
        $routeEdit = route('projects.edit', $project->id);
        $routeViewProject = '';

        if ($status) {
            $routeViewProject = <<<HTML
                <button type="button" title="Ver dados do projeto"
                    class="btn btn-sm waves-effect m-0 p-0"
                    data-edital-name="{$project->edital->name}"
                    data-agent-name="{$customer->name}" data-agent-phone="{$customer->phone}"
                    data-agent-document-type="{$customer->document_type}" data-agent-document-number="{$customer->document_number}"
                    data-agent-registration-status="{$status->agent_registration_status}" 
                    data-agent-registration-status-updated-at="{$status->agent_registration_status_updated_at}"
                    data-inscription-project-status="{$status->agent_inscription_project_status}" 
                    data-inscription-project-status-updated-at="{$status->agent_inscription_project_status_updated_at}"
                    data-identification-project-status="{$status->agent_identification_project_status}" 
                    data-identification-project-status-updated-at="{$status->agent_identification_project_status_updated_at}"
                    data-files-status="{$status->agent_files_status}"
                    data-files-status-updated-at="{$status->agent_files_status_updated_at}"
                    data-complements-status="{$status->agent_complements_status}" 
                    data-complements-status-updated-at="{$status->agent_complements_status_updated_at}"
                    onclick="loadDataInModal(this.dataset)"
                    data-target="#showModalViewProject" data-toggle="modal"
                >
                    <svg width="24" height="24" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.2" d="M30 13.125C11.25 13.125 3.75 30 3.75 30C3.75 30 11.25 46.875 30 46.875C48.75 46.875 56.25 30 56.25 30C56.25 30 48.75 13.125 30 13.125ZM30 39.375C28.1458 39.375 26.3332 38.8252 24.7915 37.795C23.2498 36.7649 22.0482 35.3007 21.3386 33.5877C20.6291 31.8746 20.4434 29.9896 20.8051 28.171C21.1669 26.3525 22.0598 24.682 23.3709 23.3709C24.682 22.0598 26.3525 21.1669 28.171 20.8051C29.9896 20.4434 31.8746 20.6291 33.5877 21.3386C35.3007 22.0482 36.7649 23.2498 37.795 24.7915C38.8252 26.3332 39.375 28.1458 39.375 30C39.375 32.4864 38.3873 34.871 36.6291 36.6291C34.871 38.3873 32.4864 39.375 30 39.375Z" fill="#0062FF"/>
                        <path d="M57.9633 29.2406C57.8812 29.0555 55.8961 24.6516 51.4828 20.2383C45.6023 14.3578 38.175 11.25 30 11.25C21.825 11.25 14.3976 14.3578 8.51717 20.2383C4.10388 24.6516 2.10935 29.0625 2.0367 29.2406C1.93009 29.4804 1.875 29.7399 1.875 30.0023C1.875 30.2648 1.93009 30.5243 2.0367 30.7641C2.11873 30.9492 4.10388 35.3508 8.51717 39.7641C14.3976 45.6422 21.825 48.75 30 48.75C38.175 48.75 45.6023 45.6422 51.4828 39.7641C55.8961 35.3508 57.8812 30.9492 57.9633 30.7641C58.0699 30.5243 58.125 30.2648 58.125 30.0023C58.125 29.7399 58.0699 29.4804 57.9633 29.2406ZM30 45C22.7859 45 16.4836 42.3773 11.2664 37.207C9.12571 35.0782 7.30448 32.6507 5.85935 30C7.30409 27.3491 9.12536 24.9215 11.2664 22.793C16.4836 17.6227 22.7859 15 30 15C37.214 15 43.5164 17.6227 48.7336 22.793C50.8784 24.921 52.7036 27.3486 54.1523 30C52.4625 33.1547 45.1008 45 30 45ZM30 18.75C27.7749 18.75 25.5999 19.4098 23.7498 20.646C21.8998 21.8821 20.4578 23.6391 19.6063 25.6948C18.7548 27.7505 18.5321 30.0125 18.9661 32.1948C19.4002 34.3771 20.4717 36.3816 22.045 37.955C23.6184 39.5283 25.6229 40.5998 27.8052 41.0338C29.9875 41.4679 32.2495 41.2451 34.3052 40.3936C36.3608 39.5422 38.1178 38.1002 39.354 36.2502C40.5902 34.4001 41.25 32.225 41.25 30C41.2469 27.0173 40.0606 24.1576 37.9515 22.0485C35.8424 19.9394 32.9827 18.7531 30 18.75ZM30 37.5C28.5166 37.5 27.0666 37.0601 25.8332 36.236C24.5998 35.4119 23.6385 34.2406 23.0709 32.8701C22.5032 31.4997 22.3547 29.9917 22.6441 28.5368C22.9335 27.082 23.6478 25.7456 24.6967 24.6967C25.7456 23.6478 27.0819 22.9335 28.5368 22.6441C29.9917 22.3547 31.4997 22.5032 32.8701 23.0709C34.2405 23.6386 35.4119 24.5999 36.236 25.8332C37.0601 27.0666 37.5 28.5166 37.5 30C37.5 31.9891 36.7098 33.8968 35.3033 35.3033C33.8968 36.7098 31.9891 37.5 30 37.5Z" fill="#556EE6"/>
                    </svg>
                </button>
                <a href="{$routeEdit}" title="Editar dados do projeto"
                    class="btn btn-sm waves-effect ml-1 p-0"
                >
                    <svg width="24" height="24" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M53.2758 17.1959L42.8039 6.7217C42.4557 6.37339 42.0423 6.09709 41.5872 5.90858C41.1322 5.72007 40.6445 5.62305 40.152 5.62305C39.6594 5.62305 39.1717 5.72007 38.7167 5.90858C38.2617 6.09709 37.8483 6.37339 37.5 6.7217L8.59924 35.6248C8.2495 35.9718 7.97222 36.3848 7.78352 36.8399C7.59481 37.2949 7.49845 37.783 7.50002 38.2756V48.7498C7.50002 49.7444 7.89511 50.6982 8.59837 51.4015C9.30163 52.1047 10.2555 52.4998 11.25 52.4998H21.7242C22.2169 52.5014 22.7049 52.405 23.16 52.2163C23.615 52.0276 24.0281 51.7503 24.375 51.4006L53.2758 22.4998C53.6241 22.1516 53.9004 21.7382 54.0889 21.2831C54.2774 20.8281 54.3745 20.3404 54.3745 19.8479C54.3745 19.3553 54.2774 18.8676 54.0889 18.4126C53.9004 17.9576 53.6241 17.5441 53.2758 17.1959ZM21.7242 48.7498H11.25V38.2756L31.875 17.6506L42.3492 28.1248L21.7242 48.7498ZM45 25.4717L34.5258 14.9998L40.1508 9.37482L50.625 19.8467L45 25.4717Z" fill="#667085"/>
                    </svg>
                </a>
            HTML;
        }
        
        return <<<HTML
            {$routeViewProject}
        HTML;
    }

    public function columns(): array
    {
        return [
            'id', 
            'customer_id',
            'edital_id',
            'identification_name',
            'status',
            'subscribe_status',
            'note',
            'motive',
        ];
    }

    public function getEditals(): array
    {
        $payload = [];
        $editals = DB::select(
            "SELECT DISTINCT
                editals.id AS id,
                editals.name
            FROM editals
            INNER JOIN tenants 
            ON editals.tenant_id = tenants.id 
            WHERE tenants.id = ?", [session('tenant_id')]
        );

        foreach ($editals as $edital) {
            $payload[] = (object) [
                'id' => $edital->id,
                'name' => Str::limit($edital->name, 40),
            ];
        }

        return $payload;
    }
}
