<?php

namespace App\Models\Project\IdentificationProject\Description;

use App\Enums\Project\Analyze\AnalyzeStatusEnum;
use App\Models\Customer\Customer;
use App\Models\Project\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class IdentificationProjectDescription extends Model
{
    protected $table = 'project_identification_project_descriptions';

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
            related: Timeline::class,
            foreignKey: 'identification_project_desccription_id',
            localKey: 'id',
        );
    }
}
