<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Territory extends Model
{
    protected $table = 'territories';

    protected $fillable = [
        'name',
        'uf_id',
    ];

    public function state(): BelongsTo
    {
        return $this->belongsTo(
            related: State::class,
            foreignKey: 'uf_id',
        );
    }
}
