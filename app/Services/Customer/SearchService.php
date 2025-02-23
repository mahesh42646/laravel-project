<?php

namespace App\Services\Customer;

use App\Helpers\Fill;
use App\Models\Customer\Customer;
use App\Models\Edital\Edital;
use Illuminate\Support\Facades\DB;

final class SearchService
{
    public function searchCpf(string $cpf, Edital $edital): array
    {
        $cpfMasked = Fill::maskCpf($cpf);
        $customer = Customer::where('cpf', $cpfMasked)
            ->where('tenant_id', $edital->tenant_id)
            ->first();

        if (! $customer) {
            return [
                'is_pj' => false,
                'is_registered' => false,
                'is_registered_edital' => false,
                'message' => 'Atenção! você não possui cadastro!',
            ];
        }

        if ($customer->type === 'PJ') {
            return [
                'is_pj' => true,
                'is_registered' => false,
                'is_registered_edital' => false,
                'message' => trim($this->getMessagePj($customer)),
            ];
        }

        $customerEdital = DB::select(
            "SELECT id FROM projects 
            WHERE edital_id = ? 
            AND customer_id = ? AND tenant_id = ? LIMIT 1", [
                $edital->id,
                $customer->id,
                $edital->tenant_id,
            ]
        );

        if (count($customerEdital) > 0) {
            return [
                'is_pj' => false,
                'is_registered' => true,
                'is_registered_edital' => true,
                'message' => trim($this->getMessageEditalFilled($customer->name, $edital)),
            ];
        }

        return [
            'is_pj' => false,
            'is_registered' => true,
            'is_registered_edital' => false,
            'message' => trim($this->getMessageRegistered($customer->id, $customer->name, $edital)),
        ];
    }

    public function searchCnpj(string $cnpj, Edital $edital): array
    {
        $cnpjMasked = Fill::maskCnpj($cnpj);
        $customer = Customer::where('cnpj', $cnpjMasked)
            ->where('tenant_id', $edital->tenant_id)
            ->first();

        if (! $customer) {
            return [
                'is_pf' => false,
                'is_registered' => false,
                'is_registered_edital' => false,
                'message' => 'Atenção! você não possui cadastro!',
            ];
        }

        if ($customer->type === 'PF') {
            return [
                'is_pf' => true,
                'is_registered' => false,
                'is_registered_edital' => false,
                'message' => trim($this->getMessagePf($customer)),
            ];
        }

        $customerEdital = DB::select(
            "SELECT id FROM projects 
            WHERE edital_id = ? 
            AND customer_id = ? AND tenant_id = ? LIMIT 1", [
                $edital->id,
                $customer->id,
                $edital->tenant_id,
            ]
        );

        if (count($customerEdital) > 0) {
            return [
                'is_pf' => false,
                'is_registered' => true,
                'is_registered_edital' => true,
                'message' => trim($this->getMessageEditalFilled($customer->company_name, $edital)),
            ];
        }

        return [
            'is_pf' => false,
            'is_registered' => true,
            'is_registered_edital' => false,
            'message' => trim($this->getMessageRegistered($customer->id, $customer->company_name, $edital)),
        ];
    }

    private function getMessageEditalFilled(string $customerName, Edital $edital): string
    {
        $routeLogin = route('public.auth.login');

        return <<<HTML
            <div class="d-flex flex-column justify-content-center align-items-center">
                <div class="alert alert-warning rounded-lg text-dark mb-3">Atenção! <strong>{$customerName},</strong> você já está participando do edital: <strong>{$edital->name}</strong>. Para acompanhar o andamento do seu projeto, acesse o seu painel de controle.</div>
                <a href="{$routeLogin}" class="w-100 btn btn-primary font-weight-semibold px-3 py-2">Acessar Painel</a>
            </div>
        HTML;
    }

    private function getMessageRegistered(string $customerId, string $customerName, Edital $edital): string
    {
        $routeCreateProject = route('public.register.projects.store', [$edital->id, $customerId]);

        return <<<HTML
            <div class="d-flex flex-column justify-content-center align-items-center">
                <div class="alert alert-warning rounded-lg text-dark mb-3">Olá <strong>{$customerName},</strong> para realizar a sua inscrição no edital: <strong>{$edital->name}</strong>, clique no link abaixo.</div>
                <a href="{$routeCreateProject}" onclick="loading(event, 'Cadastrar meu projeto', this.href)" class="w-100 btn btn-primary font-weight-semibold px-3 py-2">Cadastrar meu projeto</a>
            </div>
        HTML;
    }

    private function getMessagePj(Customer $customer): string
    {
        $routeLogin = route('public.auth.login');

        return <<<HTML
            <div class="d-flex flex-column justify-content-center align-items-center">
                <div class="alert alert-warning rounded-lg text-dark mb-3"><strong>Atenção!</strong> {$customer->name}, você já está cadastrado como <strong>Pessoa Jurídica</strong> em outro edital! <br><br> Por favor, entre no seu <a href="{$routeLogin}" style="text-decoration: underline !important;">Painel de controle (clicando aqui)</a> e altere o seu perfil de acesso para Pessoa Física!</div>
            </div>
        HTML;
    }

    private function getMessagePf(Customer $customer): string
    {
        $routeLogin = route('public.auth.login');

        return <<<HTML
            <div class="d-flex flex-column justify-content-center align-items-center">
                <div class="alert alert-warning rounded-lg text-dark mb-3"><strong>Atenção!</strong> {$customer->company_name}, você já está cadastrado como <strong>Pessoa Física!</strong> <br><br> Por favor, entre no seu <a href="{$routeLogin}" style="text-decoration: underline !important;">Painel de controle (clicando aqui)</a> e altere o seu perfil de acesso para Pessoa Jurídica!</div>
            </div>
        HTML;
    }
}
