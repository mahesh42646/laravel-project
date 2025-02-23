<?php

namespace App\Models\Project\Diligence;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    protected $table = 'project_diligence_message_documents';

    protected $fillable = [
        'name',
        'path',
        'diligence_message_id',
        'created_at',
    ];

    // RELATIONSHIPS

    public function message(): BelongsTo
    {
        return $this->belongsTo(
            related: Message::class,
            foreignKey: 'diligence_message_id',
        );
    }
}
