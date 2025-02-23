<?php

namespace App\Models\Edital;

use App\Enums\Shared\ActiveEnum;
use App\Models\SuperAdmin\Tenant\Tenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

final class DocumentType extends Model
{
    protected $table = 'edital_document_types';

    protected $fillable = [
        'name',
        'people_type_id',
        'tenant_id',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => ActiveEnum::class,
        ];
    }

    // METHODS
    
    public static function getAll(): array
    {
        $payload = [];
        $documents = DB::select(
            "SELECT
                documents.id,
                documents.name,
                people_types.name AS people_type
            FROM edital_document_types AS documents
            INNER JOIN edital_people_types AS people_types
            ON documents.people_type_id = people_types.id
            WHERE documents.tenant_id = ?", [session('tenant_id')]
        );

        foreach ($documents as $document) {
            $payload[$document->people_type][] = (object) [
                'id' => $document->id,
                'name' => $document->name,
            ];
        }

        return $payload;
    }

    public static function getNameAll(Edital $edital): array
    {
        $payload = [];
        $peopleTypes = DB::select(
            "SELECT people_types.name
            FROM edital_documents AS documents
            INNER JOIN edital_document_types AS document_types
            ON documents.document_id = document_types.id
            INNER JOIN edital_people_types AS people_types
            ON document_types.people_type_id = people_types.id
            WHERE documents.edital_id = ? GROUP BY people_types.name", [
                $edital->id
            ]
        );

        foreach ($peopleTypes as $peopleType) {
            $payload[] = $peopleType->name;
        }

        return $payload;
    }

    // SCOPES

    public function scopePf(Builder $query): void
    {
        $query
            ->where('document_type_id', 1)
            ->where('is_active', ActiveEnum::ACTIVE);
    }

    public function scopePj(Builder $query): void
    {
        $query
            ->where('document_type_id', 2)
            ->where('is_active', ActiveEnum::ACTIVE);
    }

    public function scopeCollective(Builder $query): void
    {
        $query
            ->where('document_type_id', 3)
            ->where('is_active', ActiveEnum::ACTIVE);
    }

    // RELATIONSHIPS

    public function people_type(): BelongsTo
    {
        return $this->belongsTo(
            related: PeopleType::class,
            foreignKey: 'people_type_id',
        );
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(
            related: Tenant::class,
            foreignKey: 'tenant_id',
        );
    }
}
