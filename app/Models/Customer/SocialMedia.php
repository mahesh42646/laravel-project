<?php

namespace App\Models\Customer;

use App\Enums\Shared\SocialMediaEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class SocialMedia extends Model
{
    protected $table = 'customer_social_medias';
    public $timestamps = false;

    protected $fillable = [
        'media_id',
        'link',
        'description',
        'customer_id',
    ];

    protected function casts(): array
    {
        return [
            'media_id' => SocialMediaEnum::class,
        ];
    }

    // RELATIONSHIPS

    public function customer(): BelongsTo
    {
        return $this->belongsTo(
            related: Customer::class,
            foreignKey: 'customer_id',
        );
    }
}
