<?php

namespace App\Models\Project\Diligence;

use App\Enums\Project\Diligence\StatusEnum;
use App\Models\Project\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Diligence extends Model
{
    protected $table = 'project_diligences';

    protected $fillable = [
        'project_id',
        'title',
        'status',
        'motive',
        'analyzed_by',
        'expired_at',
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];

    // RELATIONSHIPS

    public function project(): BelongsTo
    {
        return $this->belongsTo(
            related: Project::class,
            foreignKey: 'project_id',
        );
    }

    public function analyst(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'analyzed_by',
        );
    }

    public function messages(): HasMany
    {
        return $this->hasMany(
            related: Message::class,
            foreignKey: 'diligence_id',
        );
    }
}
