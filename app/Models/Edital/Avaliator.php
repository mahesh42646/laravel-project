<?php

namespace App\Models\Edital;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Avaliator extends Model
{
    protected $table = 'edital_avaliators';

    protected $fillable = [
        'user_id',
        'edital_id',
    ];

    // RELATIONSHIPS

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
        );
    }

    public function edital(): BelongsTo
    {
        return $this->belongsTo(
            related: Edital::class,
            foreignKey: 'edital_id',
        );
    }
}
