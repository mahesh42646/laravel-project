<?php

namespace App\Models\Project\IdentificationProject\Price;

use App\Enums\Project\Analyze\TimelineStatusEnum;
use App\Models\Customer\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Timeline extends Model
{
    protected $table = 'project_identification_project_price_timelines';

    protected $fillable = [
        'identification_project_price_id',
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

    public function identification_project_price(): BelongsTo
    {
        return $this->belongsTo(
            related: IdentificationProjectPrice::class,
            foreignKey: 'identification_project_price_id',
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
