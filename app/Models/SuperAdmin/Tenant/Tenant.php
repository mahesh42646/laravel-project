<?php

namespace App\Models\SuperAdmin\Tenant;

use App\Enums\Shared\ActiveEnum;
use App\Enums\Shared\RoleEnum;
use App\Models\Setting\City;
use App\Models\SuperAdmin\Company\Company;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

final class Tenant extends Model
{
    protected $table = 'tenants';

    protected $fillable = [
        'name',
        'cnpj',
        'city_id',
        'company_id',
        'phone',
        'logo',
        'is_active',
        'observation',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => ActiveEnum::class,
        ];
    }

    // ACCESSORS

    protected function logoPath(): Attribute
    {
        return Attribute::make(
            get: fn (): string =>
                match (true) {
                    (! $this->logo) => asset('assets/images/users/no-photo.webp'),
                    default => asset("storage/{$this->logo}"),
                }
        );
    }

    // METHODS

    public static function saveImage(Request $request): string
    {
        $filePath = '';

        if ($request->new_logo) {
            $filePath = $request->new_logo->storeAs(
                path: 'prefectures', 
                name: Str::random(32).'.'.$request->new_logo->extension(), 
                options: 'public',
            );
        }
        
        return $filePath;
    }

    public static function updateImage(Request $request, Tenant $tenant): string|null
    {
        if ($request->hasFile('logo_update')) {
            $path = 'prefectures';
            $fileName = Str::random(32).'.'.$request->logo_update->extension();
            $filePath = $request->logo_update->storeAs($path, $fileName, 'public');

            if ($request->has('logo_update') && $tenant->logo) {
                Storage::delete($tenant->logo);
            }

            return $filePath;
        }

        return $tenant->logo;
    }

    public static function getByUser(): LengthAwarePaginator
    {
        $user = auth()->user();

        if ($user->role_id === RoleEnum::MAIN) {
            return Tenant::paginate(50);
        }

        return Tenant::whereIn('id', $user->prefectures->pluck('id')->toArray())->paginate(50);
    }

    public static function getAll(): object
    {
        $user = auth()->user();

        if ($user->role_id === RoleEnum::MAIN ) {
            $tenants = DB::select(
                "SELECT
                    SUM(IF(tenants.is_active = 1, 1, 0)) AS active,
                    SUM(IF(tenants.is_active = 0, 1, 0)) AS inactive
                FROM tenants"
            );
        } else {
            $tenants = DB::select(
                "SELECT
                    SUM(IF(tenants.is_active = 1, 1, 0)) AS active,
                    SUM(IF(tenants.is_active = 0, 1, 0)) AS inactive
                FROM tenant_user
                INNER JOIN tenants
                ON tenant_user.tenant_id = tenants.id
                WHERE tenant_user.user_id = ?", [$user->id]
            );
        }
        
        return (object) [
            'active' => $tenants[0]->active,
            'inactive' => $tenants[0]->inactive,
        ];
    }

    public static function getUsersAll(): object
    {
        $user = auth()->user();

        if ($user->role_id === RoleEnum::MAIN ) {
            $users = DB::select(
                "SELECT
                    SUM(IF(users.is_active = 1, 1, 0)) AS active,
                    SUM(IF(users.is_active = 0, 1, 0)) AS inactive
                FROM users"
            );
        } else {
            $tenantsIds = $user->prefectures->pluck('id')->implode(',');
            $users = DB::select(
                "SELECT
                    SUM(IF(users.is_active = 1, 1, 0)) AS active,
                    SUM(IF(users.is_active = 0, 1, 0)) AS inactive
                FROM users
                WHERE tenant_id IN (?)", [$tenantsIds]
            );
        }

        return (object) [
            'active' => $users[0]->active,
            'inactive' => $users[0]->inactive,
        ];
    }

    public static function getCustomersAll(): object
    {
        $user = auth()->user();

        if ($user->role_id === RoleEnum::MAIN ) {
            $customers = DB::select(
                "SELECT
                    SUM(IF(customers.is_active = 1, 1, 0)) AS active,
                    SUM(IF(customers.is_active = 0, 1, 0)) AS inactive
                FROM customers"
            );
        } else {
            $tenantsIds = $user->prefectures->pluck('id')->implode(',');
            $customers = DB::select(
                "SELECT
                    SUM(IF(customers.is_active = 1, 1, 0)) AS active,
                    SUM(IF(customers.is_active = 0, 1, 0)) AS inactive
                FROM customers
                WHERE customers.tenant_id IN (?)", [$tenantsIds]
            );
        }

        return (object) [
            'active' => $customers[0]->active,
            'inactive' => $customers[0]->inactive,
        ];
    }

    public static function search(string|null $value): array
    {
        $payloads = [];
        $tenants = DB::select(
            "SELECT
                tenants.id, tenants.name, 
                tenants.logo, tenants.is_active
            FROM tenants
            INNER JOIN cities
            ON tenants.city_id = cities.id
            WHERE (tenants.name LIKE '%{$value}%') 
            LIMIT 50"
        );

        foreach ($tenants as $tenant) {
            $routeTenant = route('dash.tenant', $tenant->id);
            $payloads[] = (object) [
                'name' => $tenant->name,
                'logo' => $tenant->logo ? asset("storage/{$tenant->logo}") : asset('assets/images/users/no-photo.webp'),
                'route' => (object) [
                    'edit' => route('dash.tenants.edit', $tenant->id),
                ],
                'action' => $tenant->is_active == '1'
                    ? "<a href='{$routeTenant}' target='_blank' class='btn btn-dark px-5 font-weight-medium rounded-lg'>Acessar</a>"
                    : "<div class='btn btn-danger px-5 font-weight-medium rounded-lg'>Inativa</div>",
            ];
        }

        return $payloads;
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

    public function city(): BelongsTo
    {
        return $this->belongsTo(
            related: City::class,
            foreignKey: 'city_id',
        );
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(
            related: Company::class,
            foreignKey: 'company_id',
        );
    }
}
