<?php

namespace App\Models\Customer;

use App\Enums\Customer\TypeAgentEnum;
use App\Enums\Shared\ActiveEnum;
use App\Enums\Shared\SocialMediaEnum;
use App\Models\Customer\Type\Collective;
use App\Models\Customer\Type\MEI;
use App\Models\Customer\Type\PF;
use App\Models\Customer\Type\PJWithoutProfit;
use App\Models\Customer\Type\PJWithProfit;
use App\Models\Notification\Notification;
use App\Models\Notification\NotificationProfessional;
use App\Models\Project\Project;
use App\Models\SuperAdmin\Tenant\Tenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
USE Illuminate\Support\Str;

final class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'email',
        'password',
        'type_agent_id',
        'agent_pf_id',
        'agent_pj_with_profit_id',
        'agent_collective_without_cnpj_id',
        'agent_pj_without_profit_id',
        'agent_mei_id',
        'avatar_path',
        'cover_path',
        'is_active',
        'tenant_id',
        'last_login_at',
    ];

    protected function casts(): array
    {
        return [
            'type_agent_id' => TypeAgentEnum::class,
            'is_active' => ActiveEnum::class,
            'last_login_at' => 'datetime',
        ];
    }

    // MODEL BINDING CUSTOM

    public function resolveRouteBinding(mixed $value, $field = null)
    {
        if (session('tenant_id')) {
            $customer = $this->where('id', $value)
                ->where('tenant_id', session('tenant_id'))
                ->first();
            
            if (! $customer) {
                return abort(403);
            }

            return $customer;
        }

        return $this->where('id', $value)->firstOrFail();
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

    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: fn (): string =>
                match (true) {
                    (! $this->avatar_path) => asset('images/no-image.webp'),
                    default => asset("storage/{$this->avatar_path}"),
                }
        );
    }

    protected function coverPath(): Attribute
    {
        return Attribute::make(
            get: fn (): string =>
                match (true) {
                    (! $this->cover) => asset('assets/images/cover.webp'),
                    default => asset("storage/{$this->cover}"),
                }
        );
    }

    // METHODS

    public static function saveImage(UploadedFile|null $photo, int $tenantId, string $folder): string
    {
        $filePath = '';

        if ($photo) {
            $filePath = $photo->storeAs(
                path: "tenants/{$tenantId}/customers/{$folder}",
                name: Str::random(32).'.'.$photo->extension(), 
                options: 'public',
            );
        }
        
        return $filePath;
    }

    public static function updateImage(UploadedFile|null $photo, string|null $customerPhoto, int $tenantId, string $folder): string|null
    {
        if ($photo) {
            $path = "tenants/{$tenantId}/customers/{$folder}";
            $fileName = Str::random(32).'.'.$photo->extension();
            $filePath = $photo->storeAs($path, $fileName, 'public');

            if ($photo && $customerPhoto) {
                Storage::delete($customerPhoto);
            }

            return $filePath;
        }

        return $customerPhoto;
    }

    public static function getAll(): object
    {
        // $customers = DB::select(
        //     "SELECT
        //         SUM(IF(customers.type = 'PF', 1, 0)) AS pf,
        //         SUM(IF(customers.type = 'PJ', 1, 0)) AS pj
        //     FROM customers 
        //     WHERE tenant_id = ?", [session('tenant_id')]
        // );

        return (object) [
            'pf' => 1,
            'pj' => 2,
        ];
    }

    public static function getSocialMedias(): string
    {
        $socialMedias = [];

        foreach (SocialMediaEnum::cases() as $media) {
            $socialMedias[] = [
                'id' => $media->value,
                'name' => $media->getName(),
            ];
        }

        return json_encode($socialMedias);
    }

    // SCOPES

    public function scopeActive(Builder $query): void
    {
        $query->where(
            'is_active', 
            ActiveEnum::ACTIVE
        );
    }

    // RELATIONSHIPS

    public function projects(): HasMany
    {
        return $this->hasMany(
            related: Project::class,
            foreignKey: 'customer_id',
        );
    }

    public function social_medias(): HasMany
    {
        return $this->hasMany(
            related: SocialMedia::class,
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

    public function notifications(): HasMany
    {
        return $this->hasMany(
            related: Notification::class,
            foreignKey: 'to_customer_id',
        );
    }

    public function notification_professionals(): HasMany
    {
        return $this->hasMany(
            related: NotificationProfessional::class,
            foreignKey: 'from_customer_id',
        );
    }

    public function agent_pf(): HasOne
    {
        return $this->hasOne(
            related: PF::class,
            foreignKey: 'customer_id',
        );
    }

    public function agent_collective(): HasOne
    {
        return $this->hasOne(
            related: Collective::class,
            foreignKey: 'customer_id',
        );
    }

    public function agent_mei(): HasOne
    {
        return $this->hasOne(
            related: MEI::class,
            foreignKey: 'customer_id',
        );
    }

    public function agent_pj_with_profit(): HasOne
    {
        return $this->hasOne(
            related: PJWithProfit::class,
            foreignKey: 'customer_id',
        );
    }

    public function agent_pj_without_profit(): HasOne
    {
        return $this->hasOne(
            related: PJWithoutProfit::class,
            foreignKey: 'customer_id',
        );
    }
}
