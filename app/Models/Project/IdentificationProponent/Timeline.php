<?php

namespace App\Models\Project\IdentificationProponent;

use App\Enums\Project\Analyze\TimelineStatusEnum;
use App\Models\Customer\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Timeline extends Model
{
    protected $table = 'project_identification_proponent_timelines';

    protected $fillable = [
        'identification_proponent_id',
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

    public function identification_proponent(): BelongsTo
    {
        return $this->belongsTo(
            related: IdentificationProponent::class,
            foreignKey: 'identification_proponent_id',
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
