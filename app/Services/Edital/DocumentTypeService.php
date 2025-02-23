<?php

namespace App\Services\Edital;

use App\Models\Edital\DocumentType;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

final class DocumentTypeService
{
    public function getTotal(): object
    {
        $total = DB::select(
            "SELECT
                SUM(IF(people_type_id = 1, 1, 0)) AS pf,
                SUM(IF(people_type_id = 2, 1, 0)) AS pj,
                SUM(IF(people_type_id = 3, 1, 0)) AS collective
            FROM edital_document_types 
            WHERE tenant_id = ? LIMIT 1", [
                session('tenant_id')
            ]
        );

        return (object) [
            'pf' => $total[0]->pf,
            'pj' => $total[0]->pj,
            'collective' => $total[0]->collective,
        ];
    }

    public function getAll(): LengthAwarePaginator
    {
        $documents = DocumentType::query()
            ->with(['people_type', 'tenant'])
            ->select(['id', 'name', 'people_type_id', 'is_active']);

        if (request('document_type') == '1' || request('document_type') == '2' || request('document_type') == '3') {
            $documents->where('people_type_id', request('document_type'));
        }

        return $documents
            ->where('tenant_id', session('tenant_id'))
            ->paginate(10)
            ->through(function ($document) {
                return (object) ([
                    'id' => $document->id,
                    'name' => $document->name,
                    'type' => (object) [
                        'value' => $document->people_type?->id,
                        'name' => $document->people_type?->name,
                    ],
                    'is_active' => (object) [
                        'value' => $document->is_active->value,
                        'icon' => $document->is_active->getSpan(),
                        'name' => $document->is_active->getName(),
                    ],
                ]);
            });
    }
}
