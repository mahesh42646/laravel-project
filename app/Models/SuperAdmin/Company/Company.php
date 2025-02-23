<?php

namespace App\Models\SuperAdmin\Company;

use App\Enums\Shared\ActiveEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'name',
        'cnpj',
        'responsible',
        'cpf',
        'address',
        'phone',
        'observation',
    ];

    // METHODS

    public static function getUsersAll(): object
    {
        $users = DB::select(
            "SELECT
                SUM(IF(users.is_active = 1, 1, 0)) AS active,
                SUM(IF(users.is_active = 0, 1, 0)) AS inactive
            FROM users"
        );

        return (object) [
            'active' => $users[0]->active,
            'inactive' => $users[0]->inactive,
        ];
    }

    public static function search(string|null $value): array
    {
        $payloads = [];
        $companies = DB::select(
            "SELECT
                companies.id, companies.name, 
                companies.cnpj, companies.phone, companies.created_at
            FROM companies
            WHERE (companies.name LIKE '%{$value}%' 
            OR companies.cnpj LIKE '%{$value}%') 
            LIMIT 50"
        );

        foreach ($companies as $company) {
            $payloads[] = (object) [
                'id' => $company->id,
                'name' => $company->name,
                'cnpj' => $company->cnpj,
                'phone' => $company->phone,
                'created_at' => date('d/m/Y H:i', strtotime($company->created_at)),
                'route' => (object) [
                    'edit' => route('dash.companies.edit', $company->id),
                ],
            ];
        }

        return $payloads;
    }

    // SCOPES

    public function scopeActive(Builder $query): Builder
    {
        return $query->where(
            'is_active', 
            ActiveEnum::ACTIVE
        );
    }
}
