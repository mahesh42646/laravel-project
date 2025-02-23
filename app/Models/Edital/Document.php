<?php

namespace App\Models\Edital;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Document extends Model
{
    protected $table = 'edital_documents';

    protected $fillable = [
        'edital_id',
        'document_id',
        'is_required',
    ];

    // RELATIONSHIPS

    public function edital(): BelongsTo
    {
        return $this->belongsTo(
            related: Edital::class,
            foreignKey: 'edital_id',
        );
    }
}
