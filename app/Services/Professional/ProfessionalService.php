<?php

namespace App\Services\Professional;

use App\Enums\Shared\ActiveEnum;
use App\Enums\Shared\RoleEnum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

final class ProfessionalService
{
    public function getTotal(): object
    {
        $total = DB::select(
            "SELECT
                SUM(IF(is_active = 1, 1, 0)) AS active,
                SUM(IF(is_active = 0, 1, 0)) AS inactive
            FROM users 
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
        $professionals = User::query()
            ->select([
                'id', 'name', 'profile_photo', 'email', 'nickname', 
                'role_id', 'phone', 'created_at', 'is_active'
            ]);

        if (request('status') == '1' || request('status') == '0') {
            $professionals->where('is_active', request('status'));
        }

        return $professionals
            ->where('tenant_id', session('tenant_id'))
            ->paginate(10)
            ->through(function ($prtofessional) {
                return (object) ([
                    'id' => $prtofessional->id,
                    'name' => $prtofessional->name,
                    'email' => $prtofessional->email,
                    'avatar' => $prtofessional->avatar,
                    'nickname' => $prtofessional->nickname,
                    'role' => $prtofessional->role_id?->getName(),
                    'phone' => $prtofessional->phone,
                    'created_at' => $prtofessional->created_at->format('d/m/Y H:i'),
                    'is_active' => $prtofessional->is_active->getSpan(),
                ]);
            });
    }

    public static function search(string|null $value): array
    {
        $payloads = [];
        $professionals = DB::select(
            "SELECT
                id, name, nickname, cpf, role_id, phone,
                profile_photo, email, created_at, is_active
            FROM users
            WHERE role_id <> 1 
            AND (name LIKE '%{$value}%' 
            OR cpf LIKE '%{$value}%') AND tenant_id = ? 
            LIMIT 50", [session('tenant_id')]
        );

        foreach ($professionals as $professional) {
            $payloads[] = [
                'id' => $professional->id,
                'name' => $professional->name,
                'email' => $professional->email,
                'nickname' => $professional->nickname ?: '',
                'cpf' => $professional->cpf ?: '-',
                'role' => RoleEnum::tryFrom($professional->role_id)?->getName(),
                'phone' => $professional->phone,
                'created_at' => date('d/m/Y H:i', strtotime($professional->created_at)),
                'is_active' => ActiveEnum::tryFrom($professional->is_active)?->getSpan(),
                'generate_passwrod' => mb_strtolower(substr($professional->name, 0, 3)) . $professional->id . '00',
                'avatar' => (! $professional->profile_photo)
                    ? asset('images/no-image.webp')
                    : asset("storage/{$professional->profile_photo}"),
                'route' => [
                    'edit' => route('professionals.edit', $professional->id),
                    'reset' => route('professionals.reset.password.update', $professional->id),
                    'binding' => route('professionals.bindings.index', $professional->id),
                    'update' => route('professionals.reset.password.update', $professional->id),
                ]
            ];
        }

        return $payloads;
    }

    public static function searchOccupation(Request $request): array
    {
        $payload = [];
        $value = $request->filter;
        
        $occupations = DB::select(
            "SELECT id, name, code_2002
            FROM cbos
            WHERE name_filter LIKE '%{$value}%'
            LIMIT 25"
        );

        foreach ($occupations as $register) {
            $payload[] = [
                'id' => $register->id,
                'name' => $register->name,
                'cbo' => $register->code_2002,
            ];
        }

        return $payload;
    }
}
