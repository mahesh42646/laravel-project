<?php

namespace App\Services\SuperAdmin;

use App\Models\Customer\Customer;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

final class ArtistService
{
    public function getAll(): LengthAwarePaginator
    {
        return Customer::with('tenant.city')
            ->paginate(20)
            ->through(fn ($query) => (object) [
                'id' => $query->id,
                'name' => $query->name,
                'cpf' => $query->cpf,
                'city' => $query->tenant->city->name,
            ]);
    }

    public function search(string|null $value): array
    {
        $payload = [];

       
        $artists = DB::select(
            "SELECT
                customers.id,
                customers.name,
                customers.cpf,
                cities.name AS city
            FROM customers
            INNER JOIN tenants
            ON customers.tenant_id = tenants.id
            INNER JOIN cities
            ON tenants.city_id = cities.id
            WHERE customers.name LIKE '%{$value}%' 
            OR cities.name LIKE '%{$value}%' 
            LIMIT 50"
        );

        foreach ($artists as $artist) {
            $payload[] = [
                'id' => $artist->id,
                'name' => $artist->name,
                'cpf' => $artist->cpf ?: '-',
                'city' => $artist->city,
                'route' => route('dash.artists.destroy', $artist->id),
            ];
        }

        return $payload;
    }
}
