<?php

namespace App\Models\Project;

use App\Enums\Shared\ActiveEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

final class Category extends Model
{
    protected $table = 'project_categories';

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

    // SCOPES

    public function scopeActive(Builder $query): void
    {
        $query->where(
            'is_active', 
            ActiveEnum::ACTIVE
        );
    }
}
