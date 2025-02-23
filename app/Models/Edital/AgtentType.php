<?php

namespace App\Models\Edital;

use App\Enums\Shared\ActiveEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class AgtentType extends Model
{
    protected $table = 'edital_agent_types';

    protected $fillable = [
        'name',
        'people_type_id',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => ActiveEnum::class,
        ];
    }

    // SCOPE

    public function scopeActive(Builder $query): Builder
    {
        return $query->where(
            'is_active', 
            ActiveEnum::ACTIVE
        );
    }

    // RELATIONSHIP

    public function people_type(): BelongsTo
    {
        return $this->belongsTo(
            related: PeopleType::class,
            foreignKey: 'people_type_id',
        );
    }
}
