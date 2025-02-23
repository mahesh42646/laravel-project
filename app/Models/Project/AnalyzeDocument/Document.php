<?php

namespace App\Models\Project\AnalyzeDocument;

use App\Enums\Project\DocumentStatusEnum;
use App\Enums\Shared\BooleanEnum;
use App\Models\Edital\DocumentType;
use App\Models\Project\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Document extends Model
{
    protected $table = 'project_documents';

    protected $fillable = [
        'project_id',
        'document_id',
        'path',
        'status',
        'motive',
        'analyzed_by',
        'is_required',
        'expired_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => DocumentStatusEnum::class,
            'is_required' => BooleanEnum::class,
        ];
    }

    // RELATIONSHIPS

    public function project(): BelongsTo
    {
        return $this->belongsTo(
            related: Project::class,
            foreignKey: 'project_id',
        );
    }

    public function document(): BelongsTo
    {
        return $this->belongsTo(
            related: DocumentType::class,
            foreignKey: 'document_id',
        );
    }

    public function analyst(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'analyzed_by',
        );
    }

    public function timelines(): HasMany
    {
        return $this->hasMany(
            related: Timeline::class,
            foreignKey: 'document_id',
            localKey: 'id',
        );
    }
}
