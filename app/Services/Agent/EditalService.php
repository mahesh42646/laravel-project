<?php

namespace App\Services\Agent;

use App\Enums\Edital\StatusEnum;
use App\Models\Edital\Edital;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

final class EditalService
{
    public function getEditals(string $token, Request $request): LengthAwarePaginator
    {
        return Edital::query()
            ->with('tenant', 'tenant.city')
            ->orderByDesc('id')
            ->paginate(10)
            ->through(fn ($edital) => (object) [
                'id' => $edital->id,
                'name' => $edital->name,
                'url' => $this->getUrl($token, $edital, $edital->status, $request),
                'status' => $this->getStatusText($edital, $edital->status, $request),
                'tenant' => $edital->tenant->name,
                'city' => $edital->tenant->city->uf_id->getName(),
                'tenant_path' => $edital->tenant->logo_path,
                'banner_path' => asset('images/banner.webp'),
            ]);
    }

    private function getUrl(string $token, Edital $edital, StatusEnum $status, Request $request): string
    {
        $myIds = $this->getIdsEditalsFromMyProjects($request);

        if (in_array($edital->id, $myIds) || $status !== StatusEnum::ACTIVE) {
            return '#';
        }

        return route('public.panel.project.register.inscription.create', [
            $token, base64_encode($edital->id)
        ]);
    }

    private function getStatusText(Edital $edital, StatusEnum $status, Request $request): string
    {
        $myIds = $this->getIdsEditalsFromMyProjects($request);

        if (in_array($edital->id, $myIds)) {
            return <<<HTML
                <div class="mb-2">
                    <span class="rounded-pill font-size-11 px-3 font-weight-medium text-white bg-primary">
                        JÁ INSCRITO
                    </span>
                </div>
            HTML;
        }

        if ($status === StatusEnum::ACTIVE) {
            return <<<HTML
                <div class="mb-2">
                    <span class="rounded-pill font-size-11 px-3 font-weight-medium text-primary bg-white">
                        DISPONÍVEL
                    </span>
                </div>
            HTML;
        }

        if ($status === StatusEnum::FINISHED) {
            return <<<HTML
                <div class="mb-2">
                    <span class="rounded-pill font-size-11 px-3 font-weight-medium text-white bg-dark">
                        ENCERRADO
                    </span>
                </div>
            HTML;
        }

        if ($status === StatusEnum::PENDING) {
            return <<<HTML
                <div class="mb-2">
                    <span class="rounded-pill font-size-11 px-3 font-weight-medium text-dark bg-warning">
                        PENDENTE
                    </span>
                </div>
            HTML;
        }

        if ($status === StatusEnum::INACTIVE) {
            return <<<HTML
                <div class="mb-2">
                    <span class="rounded-pill font-size-11 px-3 font-weight-medium text-white bg-danger">
                        INATIVO
                    </span>
                </div>
            HTML;
        }

        return '';
    }

    private function getIdsEditalsFromMyProjects(Request $request): array
    {
        $payload = [];
        $editalIds = DB::select(
            "SELECT edital_id
            FROM projects
            WHERE customer_id = ?", [
                $request->customer_id
            ]
        );

        foreach ($editalIds as $register) {
            $payload[] = $register->edital_id;
        }

        return $payload;
    }
}
