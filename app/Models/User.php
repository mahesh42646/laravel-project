<?php

namespace App\Models;

use App\Enums\Shared\ActiveEnum;
use App\Enums\Shared\RoleEnum;
use App\Enums\Shared\SchoolingEnum;
use App\Models\Edital\Edital;
use App\Models\Setting\Occupation;
use App\Models\SuperAdmin\Tenant\Tenant;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Pagination\LengthAwarePaginator;

final class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'nickname',
        'date_of_birth',
        'gender_id',
        'cpf',
        'rg',
        'schooling_id',
        'occupation_id',
        'phone',
        'email',
        'password',
        'profile_photo',
        'role_id',
        'tenant_id',
        'is_active',
        'observation',
        'created_by',
        'updated_by',
        'last_login_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'schooling_id' => SchoolingEnum::class,
            'role_id' => RoleEnum::class,
            'is_active' => ActiveEnum::class,
            'last_login_at' => 'datetime',
        ];
    }

    // ACCESSORS

    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: fn (): string =>
                (! $this->profile_photo)
                    ? asset('images/no-image.webp')
                    : asset("storage/{$this->profile_photo}")
        );
    }

    protected function shortName(): Attribute
    {
        return Attribute::make(
            get: fn (): string =>
                $this->nickname ?: explode(' ', $this->name)[0]
        );
    }

    // SCOPES

    public function scopeActive(Builder $query): Builder
    {
        return $query->where(
            'is_active', 
            ActiveEnum::ACTIVE
        );
    }

    public function scopeAdmin(Builder $query): Builder
    {
        return $query
            ->where('role_id', RoleEnum::MAIN)
            ->orWhere('role_id', RoleEnum::SUPER_ADMIN);
    }

    // RELATIONSHIPS

    public function tenant(): BelongsTo
    {
        return $this
            ->belongsTo(related: Tenant::class, foreignKey: 'tenant_id')
            ->withDefault(callback: ['name' => 'Usuário Root']);
    }

    public function prefectures(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Tenant::class,
            table: 'tenant_user',
            foreignPivotKey: 'user_id',
            relatedPivotKey: 'tenant_id',
        );
    }

    public function occupation(): BelongsTo
    {
        return $this->belongsTo(
            related: Occupation::class,
            foreignKey: 'occupation_id',
        );
    }

    public function editals(): LengthAwarePaginator
    {
        return $this->belongsToMany(
            related: Edital::class,
            table: 'edital_assign_avaliator',
            foreignPivotKey: 'avaliator_id',
            relatedPivotKey: 'edital_id',
        )->paginate(10);
    }
}
