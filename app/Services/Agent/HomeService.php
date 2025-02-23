<?php

namespace App\Services\Agent;

use App\Enums\Edital\StatusEnum;
use App\Enums\Project\SubscribeStatusEnum;
use App\Enums\Shared\BooleanEnum;
use App\Models\Edital\Edital;
use App\Models\Project\Project;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

final class HomeService
{
    public function getAgent(Request $request): object
    {   
        $customer = session("customer_auth_{$request->customer_id}");

        if ($customer->agent_pf) {
            $agent = $customer->agent_pf;
            $city = $agent->city;

            return (object) [
                'name' => $agent->name,
                'city' => $city->name,
                'state' => $city->state->uf,
                'avatar' => $customer->avatar,
            ];
        }

        if ($customer->agent_collective) {
            $agent = $customer->agent_collective;
            $city = $agent->city;

            return (object) [
                'name' => $agent->name,
                'city' => $city->name,
                'state' => $city->state->uf,
                'avatar' => $customer->avatar,
            ];
        }

        if ($customer->agent_mei) {
            $agent = $customer->agent_mei;
            $city = $agent->city;

            return (object) [
                'name' => $agent->organization_name,
                'city' => $city->name,
                'state' => $city->state->uf,
                'avatar' => $customer->avatar,
            ];
        }

        if ($customer->agent_pj_with_profit) {
            $agent = $customer->agent_pj_with_profit;
            $city = $agent->city;

            return (object) [
                'name' => $agent->organization_name,
                'city' => $city->name,
                'state' => $city->state->uf,
                'avatar' => $customer->avatar,
            ];
        }

        if ($customer->agent_pj_without_profit) {
            $agent = $customer->agent_pj_without_profit;
            $city = $agent->city;

            return (object) [
                'name' => $agent->organization_name,
                'city' => $city->name,
                'state' => $city->state->uf,
                'avatar' => $customer->avatar,
            ];
        }

        return  (object) [
            'name' => 'Desconhecido',
            'city' => 'Cidade',
            'state' => 'UF',
            'phone' =>'(83) 9 0000-0000',
        ];
    }

    public function getProjects(Request $request): LengthAwarePaginator
    {
        return Project::query()
            ->with('edital')
            ->where('customer_id', $request->customer_id)
            ->orderByDesc('id')
            ->paginate(10)
            ->through(fn ($project) => (object) [
                'id' => $project->id,
                'name' => $project->identification_name ? "\"{$project->identification_name}\"" : 'Projeto pendente',
                'edital' => (object) [
                    'id' => $project->edital->id,
                    'name' => $project->edital->name,
                ],
                'sended_at' => $project->sended_at?->format('d/m/Y à\s H:i:s'),
                'is_subscribe_pending' => $project->subscribe_status === SubscribeStatusEnum::PENDING,
                'route' => (object) [
                    'pending' => $this->getRouteProjectPending($project),
                    'view' => $this->getRouteProjectSended($project),
                ],
            ]);
    }

    public function getEditals(string $token): array
    {
        $editals = Edital::query()
            ->with('tenant')
            ->where('status', StatusEnum::ACTIVE)
            ->orderByDesc('id')
            ->simplePaginate(3)
            ->through(fn ($edital) => [
                'id' => $edital->id,
                'name' => $edital->name,
                'tenant' => $edital->tenant->name,
                'city' => $edital->tenant->city->uf_id->getName(),
                'tenant_path' => $edital->tenant->logo_path,
                'banner_path' => asset('images/banner.webp'),
                'url' => route('public.panel.project.register.inscription.create', [
                    $token, base64_encode($edital->id)
                ]),
            ]);

        return [
            'items' => $editals->items(),
            'is_first_page' => $editals->onFirstPage(),
            'is_last_page' => $editals->onLastPage(),
            'previous_page_url' => $editals->previousPageUrl(),
            'next_page_url' => $editals->nextPageUrl(),
            'has_more_pages' => $editals->hasMorePages(),
        ];
    }

    private function getRouteProjectPending(Project $project): string
    {
        if (! $project->inscription_has_quota) {
            return route('public.panel.project.register.inscription.edit', [
                'token' => "{$project->customer_id}o1x6J2zq89o".md5($project->customer_id),
                'projectCode' => base64_encode($project->id),
            ]);
        }

        if (! $project->identification_name) {
            return route('public.panel.project.register.identification.create', [
                'token' => "{$project->customer_id}o1x6J2zq89o".md5($project->customer_id),
                'projectCode' => base64_encode($project->id),
            ]);
        }

        if (! $this->sentDocuments($project)) {
            return route('public.panel.project.register.documents.create', [
                'token' => "{$project->customer_id}o1x6J2zq89o".md5($project->customer_id),
                'projectCode' => base64_encode($project->id),
            ]);
        }

        return route('public.panel.project.register.complements.create', [
            'token' => "{$project->customer_id}o1x6J2zq89o".md5($project->customer_id),
            'projectCode' => base64_encode($project->id),
        ]);
    }

    private function getRouteProjectSended(Project $project): string
    {
        return route('public.panel.project.view.inscription.edit', [
            'token' => "{$project->customer_id}o1x6J2zq89o".md5($project->customer_id),
            'projectCode' => base64_encode($project->id),
        ]);
    }

    private function sentDocuments(Project $project): bool
    {
        $filesRequireds = $project->files->where('is_required', BooleanEnum::YES);

        foreach ($filesRequireds as $file) {
            if (! $file->path) {
                return false;
            }
        }

        return true;
    }
}
