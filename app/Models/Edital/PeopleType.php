<?php

namespace App\Models\Edital;

use App\Enums\Shared\ActiveEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

final class PeopleType extends Model
{
    protected $table = 'edital_people_types';

    protected $fillable = [
        'name',
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
}
