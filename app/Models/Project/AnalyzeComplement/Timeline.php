<?php

namespace App\Models\Project\AnalyzeComplement;

use App\Enums\Project\Analyze\TimelineStatusEnum;
use App\Models\Customer\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Timeline extends Model
{
    protected $table = 'project_analyze_status_complement_timelines';

    protected $fillable = [
        'analyze_status_complement_id',
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

    public function analyze_status_complement(): BelongsTo
    {
        return $this->belongsTo(
            related: AnalyzeComplement::class,
            foreignKey: 'analyze_status_complement_id',
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
}
