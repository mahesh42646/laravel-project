<?php

namespace App\Models\Project\InscriptionProject;

use App\Enums\Project\Analyze\TimelineStatusEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Timeline extends Model
{
    protected $table = 'project_inscription_project_timelines';

    protected $fillable = [
        'inscription_project_id',
        'status',
        'motive',
        'customer_id',
        'analyzed_by',
        'expired_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => TimelineStatusEnum::class,
            'expired_at' => 'datetime',
        ];
    }

    // RELATIONSHIPS

    public function inscription_project(): BelongsTo
    {
        return $this->belongsTo(
            related: InscriptionProject::class,
            foreignKey: 'inscription_project_id',
        );
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
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
}
