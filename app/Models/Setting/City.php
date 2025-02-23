<?php

namespace App\Models\Setting;

use App\Enums\Shared\ActiveEnum;
use App\Enums\Shared\BrazilianStatesEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

final class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'name',
        'uf_id',
        'description',
        'is_active',
    ];

    protected $casts = [
        'uf_id' => BrazilianStatesEnum::class,
        'is_active' => ActiveEnum::class,
    ];

    // METHODS

    public static function search(string|null $value): array
    {
        $payloads = [];
        $cities = DB::select(
            "SELECT 
                id, name, uf_id, description, is_active
            FROM cities
            WHERE name LIKE '%{$value}%'
            LIMIT 50"
        );

        foreach ($cities as $city) {
            $payloads[] = (object) [
                'id' => $city->id,
                'name' => $city->name,
                'uf' => BrazilianStatesEnum::tryFrom($city->uf_id)?->getName(),
                'route' => (object) [
                    'show' => route('dash.cities.show', $city->id),
                    'edit' => route('dash.cities.edit', $city->id),
                ],
                'status' => (object) [
                    'name' => ActiveEnum::tryFrom($city->is_active)?->getName(),
                    'color' => ActiveEnum::tryFrom($city->is_active)?->getColor(),
                ],
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
}
