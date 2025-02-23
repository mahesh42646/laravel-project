<?php

namespace App\Models\Customer\Type;

use App\Models\Customer\Customer;
use App\Models\Setting\Territory;
use App\Models\SuperAdmin\Tenant\Tenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Collective extends Model
{
    protected $table = 'customer_agent_collectives';

    protected $fillable = [
        'customer_id',
        'tenant_id',
        'representant_cpf',
        'representant_name',
        'name',
        'registered_at',
        'participants_total',
        'responsable_name',
        'phone',
        'city_id',
        'address',
    ];

    protected function casts(): array
    {
        return [
            'registered_at' => 'date',
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

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(
            related: Tenant::class,
            foreignKey: 'tenant_id',
        );
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(
            related: Territory::class,
            foreignKey: 'city_id',
        );
    }
}
