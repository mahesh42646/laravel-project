<?php

namespace App\Services\Agent;

use App\Models\Customer\Customer;

final class AgentService
{
    public function getPayload(Customer $customer): object
    {
        $payload = [];

        if ($customer->agent_pf_id) {
            $payload['name'] = $customer->agent_pf->name;
            $payload['document_type'] = "CPF";
            $payload['document_number'] = "{$customer->agent_pf->cpf}";
            $payload['phone'] = $customer->agent_pf->phone;
        }

        if ($customer->agent_collective_without_cnpj_id) {
            $payload['name'] = $customer->agent_collective->representant_name;
            $payload['document_type'] = "CPF";
            $payload['document_number'] = "{$customer->agent_collective->representant_cpf}";
            $payload['phone'] = $customer->agent_collective->phone;
        }

        if ($customer->agent_pj_with_profit_id) {
            $payload['name'] = $customer->agent_pj_with_profit->organization_name;
            $payload['document_type'] = "CNPJ";
            $payload['document_number'] = "{$customer->agent_pj_with_profit->cnpj}";
            $payload['phone'] = $customer->agent_pj_with_profit->phone;
        }

        if ($customer->agent_pj_without_profit_id) {
            $payload['name'] = $customer->agent_pj_without_profit->organization_name;
            $payload['document_type'] = "CNPJ";
            $payload['document_number'] = "{$customer->agent_pj_without_profit->cnpj}";
            $payload['phone'] = $customer->agent_pj_without_profit->phone;
        }

        if ($customer->agent_mei_id) {
            $payload['name'] = $customer->agent_mei->organization_name;
            $payload['document_type'] = "CNPJ";
            $payload['document_number'] = "{$customer->agent_mei->cnpj}";
            $payload['phone'] = $customer->agent_mei->phone;
        }

        $payload['avatar'] = $customer->avatar;

        return (object) $payload;
    }
}
