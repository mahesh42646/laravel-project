<?php

namespace App\Models\Project\AnalyzeDocument;

use App\Enums\Project\Analyze\AnalyzeStatusEnum;
use App\Models\Customer\Customer;
use App\Models\Project\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class AnalyzeDocument extends Model
{
    protected $table = 'project_analyze_status_documents';

    protected $fillable = [
        'project_id',
        'status',
        'motive',
        'customer_id',
        'analyzed_by',
        'expired_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => AnalyzeStatusEnum::class,
            'expired_at' => 'datetime',
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

    public function customer(): BelongsTo
    {
        return $this->belongsTo(
            related: Customer::class,
            foreignKey: 'customer_id',
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
            related: AnalyzeDocumentTimeline::class,
            foreignKey: 'analyze_status_document_id',
            localKey: 'id',
        );
    }
}
