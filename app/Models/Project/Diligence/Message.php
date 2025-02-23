<?php

namespace App\Models\Project\Diligence;

use App\Enums\Project\Diligence\SenderEnum;
use App\Models\Customer\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Message extends Model
{
    protected $table = 'project_diligence_messages';

    public $timestamps = false;

    protected $fillable = [
        'diligence_id',
        'content',
        'analyst_id',
        'customer_id',
        'sender_id',
        'registered_at',
    ];

    protected $casts = [
        'sender_id' => SenderEnum::class,
        'registered_at' => 'datetime',
    ];

    // RELATIONSHIPS

    public function diligence(): BelongsTo
    {
        return $this->belongsTo(
            related: Diligence::class,
            foreignKey: 'diligence_id',
        );
    }

    public function analyst(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'analyst_id',
        );
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(
            related: Customer::class,
            foreignKey: 'customer_id',
        );
    }

    public function documents(): HasMany
    {
        return $this->hasMany(
            related: Document::class,
            foreignKey: 'diligence_message_id',
        );
    }
}
