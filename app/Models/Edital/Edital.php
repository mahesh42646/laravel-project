<?php

namespace App\Models\Edital;

use App\Casts\MaskCnpj;
use App\Casts\MaskMoney;
use App\Enums\Edital\RegisterTypeEnum;
use App\Enums\Edital\StatusEnum;
use App\Enums\Edital\TypeEnum;
use App\Models\SuperAdmin\Tenant\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

final class Edital extends Model
{
    protected $table = 'editals';

    protected $fillable = [
        'name',
        'type_id',
        'open_at',
        'horary_open_at',
        'closed_at',
        'horary_closed_at',
        'price',
        'vacancies',
        'register_type_id',
        'observation',
        'photo',
        'banner',
        'extended_at',
        'horary_extended_at',
        'documentation_type_id',
        'status',
        'tenant_id',
    ];

    protected function casts(): array
    {
        return [
            'type_id' => TypeEnum::class,
            'company_cnpj_masked' => MaskCnpj::class.':company_cnpj',
            'open_at' => 'date',
            'closed_at' => 'date',
            'extended_at' => 'date',
            'price_masked' => MaskMoney::class.':price',
            'register_type_id' => RegisterTypeEnum::class,
            'status' => StatusEnum::class,
        ];
    }

    // MODEL BINDING CUSTOM

    public function resolveRouteBinding($value, $field = null)
    {
        if (session('tenant_id')) {
            $edital = $this->where('id', $value)
                ->where('tenant_id', session('tenant_id'))
                ->first();
            
            if (! $edital) {
                return abort(403);
            }

            return $edital;
        }

        return $this->where('id', $value)->firstOrFail();
    }

    // ACCESSORS

    protected function photoPath(): Attribute
    {
        return Attribute::make(
            get: fn (): string =>
                match (true) {
                    (! $this->photo) => asset('images/brasao.webp'),
                    default => asset("storage/{$this->photo}"),
                }
        );
    }

    protected function bannerPath(): Attribute
    {
        return Attribute::make(
            get: fn (): string =>
                match (true) {
                    (! $this->banner) => asset('images/rodape.webp'),
                    default => asset("storage/{$this->banner}"),
                }
        );
    }

    // METHODS
    
    public static function updateImage(UploadedFile|string|null $file, string|null $imagePath): string|null
    {
        if ($file) {
            $path = 'tenants/' . session('tenant_id') . '/editals/images';
            $fileName = Str::random(32).'.'.$file->extension();
            $filePath = $file->storeAs($path, $fileName, 'public');

            if ($file && $imagePath) {
                Storage::delete($imagePath);
            }

            return $filePath;
        }

        return $imagePath;
    }

    public static function getAll(): object
    {
        $editals = DB::select(
            "SELECT
                SUM(IF(editals.status = 1, 1, 0)) AS active,
                SUM(IF(editals.status = 3, 1, 0)) AS inactive,
                SUM(IF(editals.status = 4, 1, 0)) AS finished
            FROM editals
            WHERE tenant_id = ?", [session('tenant_id')]
        );

        return (object) [
            'active' => $editals[0]->active,
            'inactive' => $editals[0]->inactive,
            'finished' => $editals[0]->finished,
        ];
    }

    // SCOPES

    public function scopeActive(Builder $query): void
    {
        $query
            ->where('status', StatusEnum::ACTIVE)
            ->where('tenant_id', session('tenant_id'));
    }

    // RELATIONSHIPS

    public function attachments(): HasMany
    {
        return $this->hasMany(
            related: Attachment::class,
            foreignKey: 'edital_id',
        );
    }

    public function quotas(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Quota::class,
            table: 'edital_quota',
            foreignPivotKey: 'edital_id',
            relatedPivotKey: 'quota_id',
        );
    }

    public function identifications(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Identification::class,
            table: 'edital_project_identification',
            foreignPivotKey: 'edital_id',
            relatedPivotKey: 'field_project_identification_id',
        )->withPivot(['is_required']);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(
            related: Document::class,
            foreignKey: 'edital_id',
        );
    }

    public function peoples_types(): BelongsToMany
    {
        return $this->belongsToMany(
            related: PeopleType::class,
            table: 'edital_people_type',
            foreignPivotKey: 'edital_id',
            relatedPivotKey: 'people_type_id',
        );
    }

    public function avaliators(): BelongsToMany
    {
        return $this->belongsToMany(
            related: User::class,
            table: 'edital_assign_avaliator',
            foreignPivotKey: 'edital_id',
            relatedPivotKey: 'avaliator_id',
        );
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(
            related: Tenant::class,
            foreignKey: 'tenant_id',
        );
    }
}
