<?php

namespace App\Services\Edital;

use App\Enums\Edital\StatusEnum;
use App\Http\Requests\Tenant\Edital\EditalRequest;
use App\Models\Edital\Edital;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

final class EditalService
{
    public static function search(string|null $value): array
    {
        $payload = [];
        $editals = DB::select(
            "SELECT
                id, name, price, horary_open_at, horary_closed_at, 
                created_at, closed_at, extended_at, horary_extended_at, status
            FROM editals
            WHERE name LIKE '%{$value}%' AND tenant_id = ? 
            LIMIT 50", [session('tenant_id')]
        );

        foreach ($editals as $edital) {
            $payload[] = [
                'id' => $edital->id,
                'name' => Str::limit($edital->name, 50),
                'price' => 'R$ ' . number_format($edital->price, 2, ',', '.'),
                'created_at' => date('d/m/Y H:i', strtotime($edital->created_at)),
                'closed_at' => date('d/m/Y', strtotime($edital->closed_at)) . ' ' . $edital->horary_closed_at,
                'extended_at' => $edital->extended_at ? date('d/m/Y', strtotime($edital->extended_at)) . ' ' . $edital->horary_extended_at : '',
                'status' => [
                    'icon' => StatusEnum::tryFrom($edital->status)?->getSpan(),
                    'value' => $edital->status,
                ],
                'route' => [
                    'edit' => route('editals.edit', $edital->id),
                    'assign' => route('editals.assign.avaliator.index', $edital->id),
                    'destroy' => route('editals.destroy', $edital->id),
                    'register' => route('public.register.customers.show', base64_encode($edital->id))
                ]
            ];
        }

        return $payload;
    }
    
    public function getTotal(): object
    {
        $total = DB::select(
            "SELECT
                SUM(IF(status = 1, 1, 0)) AS active,
                SUM(IF(status = 2, 1, 0)) AS pending,
                SUM(IF(status = 3, 1, 0)) AS inactive,
                SUM(IF(status = 4, 1, 0)) AS finished
            FROM editals 
            WHERE tenant_id = ? LIMIT 1", [
                session('tenant_id')
            ]
        );

        return (object) [
            'active' => $total[0]->active,
            'pending' => $total[0]->pending,
            'inactive' => $total[0]->inactive,
            'finished' => $total[0]->finished,
        ];
    }

    public function getAll(): LengthAwarePaginator
    {
        $editals = Edital::query()->select([
            'id', 'name', 'price', 'created_at', 'closed_at', 'horary_closed_at',
            'extended_at', 'horary_extended_at', 'status'
        ]);

        if (request('status') === '1') { $editals->where('status', request('status')); }
        if (request('status') === '2') { $editals->where('status', request('status')); }
        if (request('status') === '3') { $editals->where('status', request('status')); }
        if (request('status') === '4') { $editals->where('status', request('status')); }

        return $editals
            ->where('tenant_id', session('tenant_id'))
            ->paginate(10)
            ->through(function ($edital) {
                return (object) ([
                    'id' => $edital->id,
                    'name' => $edital->name,
                    'price' => $edital->price_masked,
                    'created_at' => $edital->created_at->format('d/m/Y H:i'),
                    'closed_at' => $edital->closed_at->format('d/m/Y') . ' ' . $edital->horary_closed_at,
                    'extended_at' => $edital->extended_at?->format('d/m/Y') ? $edital->extended_at->format('d/m/Y')  . ' ' . $edital->horary_extended_at : null,
                    'status' => (object) [
                        'icon' => $edital->status->getSpan(),
                        'value' => $edital->status->value,
                    ]
                ]);
            });
    }
    
    public function saveImages(EditalRequest $request, Edital $edital): void
    {
        $tenantId = session('tenant_id');
        $basePath = "tenants/{$tenantId}/editals/{$edital->id}";
        $logo = $request->logo;
        $banner = $request->banner;

        if ($logo) {
            $fileName = Str::random(32) . '.' . $logo->extension();
            $filePath = $logo->storeAs($basePath, $fileName, 'public');
            $edital->update(['photo' => $filePath]);
        }

        if ($banner) {
            $fileName = Str::random(32) . '.' . $banner->extension();
            $filePath = $banner->storeAs($basePath, $fileName, 'public');
            $edital->update(['banner' => $filePath]);
        }
    }

    public function saveAttachmentsPDF(Request $request, Edital $edital): void
    {
        $payloads = [];
        $tenantId = session('tenant_id');
        $basePath = "tenants/{$tenantId}/editals/{$edital->id}/attachments";
        $attachmentFiles = (array) $request->attachment_files;
        $attachmentNames = (array) $request->attachment_names;

        foreach ($attachmentFiles as $index => $attachment) {
            $fileName = Str::random(32) . '.' . $attachment->extension();
            $filePath = $attachment->storeAs($basePath, $fileName, 'public');

            $payloads[] = [
                'edital_id' => $edital->id,
                'name' => trim(mb_strtoupper($attachmentNames[$index])),
                'path' => $filePath,
            ];
        }

        DB::table('edital_attachments')->insert($payloads);
    }

    public function saveDocumentations(EditalRequest $request, Edital $edital): void
    {
        $payloads = [];

        foreach ((array) $request->documentation_type_requireds as $documentId) {
            $payloads[] = $this->prepareDocument($edital->id, $documentId, true);
        }

        foreach ((array) $request->documentation_type_optionals as $documentId) {
            $payloads[] = $this->prepareDocument($edital->id, $documentId, false);
        }

        DB::table('edital_documents')->insert($payloads);
    }

    public function saveIdentificationFields(EditalRequest $request, Edital $edital): void
    {
        $payloads = [];

        foreach ((array) $request->identification_requireds as $fieldRequiredId) {
            $payloads[] = [
                'edital_id' => $edital->id,
                'field_project_identification_id' => $fieldRequiredId,
                'is_required' => true,
            ];
        }

        foreach ((array) $request->identification_optionals as $fieldOptionalId) {
            $payloads[] = [
                'edital_id' => $edital->id,
                'field_project_identification_id' => $fieldOptionalId,
                'is_required' => false,
            ];
        }

        DB::table('edital_project_identification')->insert($payloads);
    }

    public function updateIdentificationFields(EditalRequest $request, Edital $edital): void
    {
        $payloads = [];

        DB::table('edital_project_identification')
            ->where('edital_id', $edital->id)
            ->delete();

        foreach ((array) $request->identification_requireds as $fieldRequiredId) {
            $payloads[] = [
                'edital_id' => $edital->id,
                'field_project_identification_id' => $fieldRequiredId,
                'is_required' => true,
            ];
        }

        foreach ((array) $request->identification_optionals as $fieldOptionalId) {
            $payloads[] = [
                'edital_id' => $edital->id,
                'field_project_identification_id' => $fieldOptionalId,
                'is_required' => false,
            ];
        }

        DB::table('edital_project_identification')->insert($payloads);
    }

    public function updateDocumentations(EditalRequest $request, Edital $edital): void
    {
        $payloads = [];

        DB::table('edital_documents')
            ->where('edital_id', $edital->id)
            ->delete();

        foreach ((array) $request->documentation_type_requireds as $documentId) {
            $payloads[] = $this->prepareDocument($edital->id, $documentId, true);
        }

        foreach ((array) $request->documentation_type_optionals as $documentId) {
            $payloads[] = $this->prepareDocument($edital->id, $documentId, false);
        }

        DB::table('edital_documents')->insert($payloads);
    }

    private function prepareDocument(int $editalId, string $documentId, bool $isRequired): array
    {
        return [
            'edital_id' => $editalId,
            'document_id' => $documentId,
            'is_required' => $isRequired,
        ];
    }

    public function getFieldIdentifications(Edital $edital): array
    {
        $editalIdentifications = $edital->identifications->toArray();
        $ids = array_column($editalIdentifications, 'id');
        $isRequireds = array_column(array_column($editalIdentifications, 'pivot'), 'is_required');
            
        return array_combine($ids, $isRequireds);
    }
    
    public function delete(Edital $edital): void
    {
        $diskPublic = Storage::disk('public');
        $imagesToDelete = [$edital->photo, $edital->banner];

        foreach ($imagesToDelete as $image) {
            if (!empty($image) && $diskPublic->exists($image)) {
                $diskPublic->delete($image);
            }
        }

        $edital->attachments()->delete();
        $edital->quotas()->delete();
        $edital->identifications()->delete();
        $edital->documents()->delete();
        $edital->peoples_types()->delete();
        $edital->avaliators()->delete();
        $edital->delete();
    }
}
