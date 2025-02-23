<?php

namespace App\Models\Customer\Type;

use App\Casts\MaskMoney;
use App\Enums\Customer\CommunityTraditionalEnum;
use App\Enums\Customer\MainAreaAtuationEnum;
use App\Enums\Shared\BooleanEnum;
use App\Enums\Shared\BreedEnum;
use App\Enums\Shared\GenderEnum;
use App\Enums\Shared\SchoolingEnum;
use App\Models\Customer\Customer;
use App\Models\Setting\Territory;
use App\Models\SuperAdmin\Tenant\Tenant;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class PF extends Model
{
    protected $table = 'customer_agent_pfs';

    protected $fillable = [
        'customer_id',
        'tenant_id',
        'name',
        'cpf',
        'date_of_birth',
        'rg',
        'nickname',
        'gender_id',
        'breed_id',
        'is_lgbt',
        'schooling_id',
        'income',
        'area_atuation_id',
        'area_atuation_other',
        'community_traditional_id',
        'is_pcd',
        'deiciency_name',
        'is_beneficiary_program_social',
        'city_id',
        'address',
        'phone',
        'responsible_name',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'gender_id' => GenderEnum::class,
            'breed_id' => BreedEnum::class,
            'is_lgbt' => BooleanEnum::class,
            'schooling_id' => SchoolingEnum::class,
            'income_masked' => MaskMoney::class.':income',
            'area_atuation_id' => MainAreaAtuationEnum::class,
            'community_traditional_id' => CommunityTraditionalEnum::class,
            'is_pcd' => BooleanEnum::class,
            'is_beneficiary_program_social' => BooleanEnum::class,
            'last_login_at' => 'datetime',
        ];
    }

    // ACCESSORS

    protected function firstName(): Attribute
    {
        return Attribute::make(
            get: fn (): string =>
                str_contains($this->name, ' ') 
                    ? explode(' ', $this->name)[0]
                    : $this->name
        );
    }

    protected function shortName(): Attribute
    {
        return Attribute::make(
            get: function (): string {
                if (str_contains($this->name, ' ')) {
                    $fullName = explode(' ', $this->name);
                    $firstName = $fullName[0];
                    $lastName = $fullName[count($fullName) - 1];

                    return "{$firstName} {$lastName}";
                }

                return $this->name;
            }
        );
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
