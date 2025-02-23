<?php

namespace App\Services\Customer;

use App\Enums\Customer\TypeAgentEnum;
use App\Enums\Shared\ActiveEnum;
use App\Models\Customer\Customer;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

final class CustomerService
{
    public function getTotal(): object
    {
        $total = DB::select(
            "SELECT
                SUM(IF(is_active = 1, 1, 0)) AS active,
                SUM(IF(is_active = 0, 1, 0)) AS inactive
            FROM customers 
            WHERE tenant_id = ? LIMIT 1", [
                session('tenant_id')
            ]
        );

        return (object) [
            'active' => $total[0]->active,
            'inactive' => $total[0]->inactive,
        ];
    }

    public function getAll(): LengthAwarePaginator
    {
        $customers = Customer::query()
            ->with(['agent_pf', 'agent_collective', 'agent_mei', 'agent_pj_with_profit', 'agent_pj_without_profit'])
            ->select(['id', 'type_agent_id', 'created_at', 'is_active', 'avatar_path']);

        if (request('status') == '1' || request('status') == '0') {
            $customers->where('is_active', request('status'));
        }

        return $customers
            ->where('tenant_id', session('tenant_id'))
            ->paginate(10)
            ->through(function ($customer) {
                return (object) ([
                    'id' => $customer->id,
                    'created_at' => $customer->created_at->format('d/m/Y H:i'),
                    'is_active' => $customer->is_active->getSpan(),
                    'avatar' => $customer->avatar,
                    'agent' => $customer->type_agent_id->getName(),
                ] + $this->getAgent($customer));
            });
    }

    public function search(string|null $value): array
    {
        $payload = [];
        $customers = DB::select(
            "SELECT
                customers.id,
                customers.type_agent_id,
                customers.is_active,
                customers.avatar_path,
                customers.created_at,
                pfs.nickname,

                CASE
                    WHEN pfs.name IS NOT NULL THEN pfs.name
                    WHEN pjs.organization_name IS NOT NULL THEN pjs.organization_name
                    WHEN meis.organization_name IS NOT NULL THEN meis.organization_name
                    WHEN pj_without_profits.organization_name IS NOT NULL THEN pj_without_profits.organization_name
                    ELSE pfs.name
                END AS agent_name,

                CASE
                    WHEN pfs.phone IS NOT NULL THEN pfs.phone
                    WHEN pjs.phone IS NOT NULL THEN pjs.phone
                    WHEN meis.phone IS NOT NULL THEN meis.phone
                    WHEN pj_without_profits.phone IS NOT NULL THEN pj_without_profits.phone
                    ELSE pfs.phone
                END AS agent_phone

            FROM customers
            LEFT JOIN customer_agent_pfs AS pfs
            ON customers.id = pfs.customer_id
            LEFT JOIN customer_agent_pj_with_profits AS pjs
            ON customers.id = pjs.customer_id
            LEFT JOIN customer_agent_meis AS meis
            ON customers.id = meis.customer_id
            LEFT JOIN customer_agent_pj_without_profits AS pj_without_profits
            ON customers.id = pj_without_profits.customer_id
            WHERE (
                (pfs.name LIKE '%{$value}%' OR meis.organization_name LIKE '%{$value}%' OR pjs.organization_name LIKE '%{$value}%' OR pj_without_profits.organization_name LIKE '%{$value}%')
            )
            AND customers.tenant_id = ? 
            LIMIT 50", [session('tenant_id')]
        );

        foreach ($customers as $customer) {
            $payload[] = [
                'id' => $customer->id,
                'name' => $customer->agent_name,
                'nickname' => $customer->nickname ?: '',
                'type' => TypeAgentEnum::tryFrom($customer->type_agent_id)->getName(),
                'phone' => $customer->agent_phone,
                'is_active' => ActiveEnum::tryFrom($customer->is_active)?->getSpan(),
                'created_at' => date('d/m/Y H:i', strtotime($customer->created_at)),
                'avatar' => ! $customer->avatar_path 
                    ? asset('images/no-image.webp')
                    : asset("storage/{$customer->avatar_path}"),
                'route' => [
                    'reset_password' => route('customers.password.edit', $customer->id),
                    'edit' => route('customers.edit', $customer->id),
                    'destroy' => route('customers.destroy', $customer->id),
                ],
            ];
        }

        return $payload;
    }

    public static function searchCity(Request $request): array
    {
        $payload = [];
        $value = $request->filter;
        
        $cities = DB::select(
            "SELECT
                territories.id, 
                territories.name AS city_name, 
                states.name AS state_name
            FROM territories
            INNER JOIN states
            ON territories.uf_id = states.id
            WHERE (territories.name LIKE '%{$value}%')
            LIMIT 25"
        );

        foreach ($cities as $register) {
            $payload[] = [
                'id' => $register->id,
                'name' => $register->city_name,
                'state' => $register->state_name,
            ];
        }

        return $payload;
    }

    public function getAgent(Customer $customer): array
    {   
        if ($customer->agent_pf) {
            return [
                'name' => $customer->agent_pf->name,
                'nickname' => $customer->agent_pf->nickname,
                'phone' => $customer->agent_pf->phone,
            ];
        }

        if ($customer->agent_collective) {
            return [
                'name' => $customer->agent_collective->name,
                'nickname' => '',
                'phone' => $customer->agent_collective->phone,
            ];
        }

        if ($customer->agent_mei) {
            return [
                'name' => $customer->agent_mei->organization_name,
                'nickname' => '',
                'phone' => $customer->agent_mei->phone,
            ];
        }

        if ($customer->agent_pj_with_profit) {
            return [
                'name' => $customer->agent_pj_with_profit->organization_name,
                'nickname' => '',
                'phone' => $customer->agent_pj_with_profit->phone,
            ];
        }

        if ($customer->agent_pj_without_profit) {
            return [
                'name' => $customer->agent_pj_without_profit->organization_name,
                'nickname' => '',
                'phone' => $customer->agent_pj_without_profit->phone,
            ];
        }

        return [
            'name' => 'joao',
            'nickname' => '',
            'phone' =>'92213123',
        ];
    }
}
