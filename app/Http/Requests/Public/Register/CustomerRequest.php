<?php

namespace App\Http\Requests\Public\Register;

use App\Enums\Customer\TypeAgentEnum;
use App\Helpers\Fill;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Customer\Customer;
use App\Models\Customer\Type\Collective;
use App\Models\Customer\Type\MEI;
use App\Models\Customer\Type\PF;
use App\Models\Customer\Type\PJWithoutProfit;
use App\Models\Customer\Type\PJWithProfit;

final class CustomerRequest extends FormRequest
{
    public function rules(): array
    {
        if ($this->isMethod('POST') && $this->type_agent_id == TypeAgentEnum::PF->value) {
            return $this->validateAgentPF();
        }

        if ($this->isMethod('POST') && $this->type_agent_id == TypeAgentEnum::COLLECTIVE->value) {
            return $this->validateCollective();
        }

        if (
            $this->isMethod('POST') && 
            ($this->type_agent_id == TypeAgentEnum::PJ_WITH_PROFIT->value || 
            $this->type_agent_id == TypeAgentEnum::PJ_WITHOUT_PROFIT->value || 
            $this->type_agent_id == TypeAgentEnum::MEI->value)
        ) {
            return $this->validateEntity();
        }

        if ($this->isMethod('POST') && ! $this->type_agent_id) {
            return ['type_agent' => ['required']];
        }
    }

    public function attributes(): array
    {
        return [
            'cpf' => '<strong>CPF</strong>',
            'name' => '<strong>nome completo</strong>',
            'date_of_birth' => '<strong>data de nascimento</strong>',
            'rg' => '<strong>RG</strong>',
            'nickname' => '<strong>nome social</strong>',
            'gender_id' => '<strong>gênero</strong>',
            'breed_id' => '<strong>raça</strong>',
            'is_lgbt' => '<strong>você é LGBTQIAPN+?</strong>',
            'schooling_id' => '<strong>escolaridade</strong>',
            'income' => '<strong>renda individual</strong>',
            'area_atuation_id' => '<strong>principal área de atuação</strong>',
            'area_atuation_other' => '<strong>outras áreas de atuação</strong>',
            'community_traditional_id' => '<strong>comunidades tradicionais</strong>',
            'is_pcd' => '<strong>você tem deficiência PCD?</strong>',
            'deiciency_name' => '<strong>em caso sem para PCD qual?</strong>',
            'is_beneficiary_program_social' => '<strong>>beneficiário de algum programa social?</strong>',
            'city_id' => '<strong>cidade</strong>',
            'address' => '<strong>endereço completo</strong>',
            'phone' => '<strong>telefone</strong>',
            'responsible_name' => '<strong>nome do responsável pelo cadastro</strong>',
            'email' => '<strong>e-mail</strong>',
            'password' => '<strong>senha</strong>',
        ];
    }

    public function messages(): array
    {
        return [
            'cpf.unique' => 'O CPF informado já está sendo utilizado',
            'cpf.size' => 'O campo CPF deve conter 11 dígitos',
            'phone.size' => 'O campo telefone deve conter 11 dígitos',
        ];
    }

    public function payload(): array
    {
        return [
            'email' => mb_strtolower($this->email),
            'password' => $this->password,
            'type_agent_id' => $this->type_agent_id,
            'tenant_id' => session('tenant_id'),
        ];
    }

    public function bindAgent(Customer $customer): void
    {
        if ($customer->type_agent_id === TypeAgentEnum::PF) {
            $agentPf = PF::create([
                'customer_id' => $customer->id,
                'tenant_id' => session('tenant_id'),
                'name' => trim(mb_strtoupper($this->name)),
                'cpf' => $this->cpf,
                'date_of_birth' => $this->convertDateOfBirth($this->date_of_birth),
                'rg' => trim(mb_strtoupper($this->rg)),
                'nickname' => $this->nickname,
                'gender_id' => $this->gender_id,
                'breed_id' => $this->breed_id,
                'is_lgbt' => $this->is_lgbt,
                'schooling_id' => $this->schooling_id,
                'income' => Fill::maskCurrencyBrlToEua($this->income),
                'area_atuation_id' => $this->area_atuation_id,
                'area_atuation_other' => $this->area_atuation_other,
                'community_traditional_id' => $this->community_traditional_id,
                'is_pcd' => $this->is_pcd,
                'deiciency_name' => $this->deiciency_name,
                'is_beneficiary_program_social' => $this->is_beneficiary_program_social,
                'city_id' => $this->city_id,
                'address' => $this->address,
                'phone' => $this->phone,
                'responsible_name' => trim(mb_strtoupper($this->responsible_name)),
            ]);

            $customer->update([
                'agent_pf_id' => $agentPf->id
            ]);
        }

        if ($customer->type_agent_id === TypeAgentEnum::COLLECTIVE) {
            $agentCollective = Collective::create([
                'customer_id' => $customer->id,
                'tenant_id' => session('tenant_id'),
                'representant_cpf' => $this->collective_representant_cpf,
                'representant_name' => trim(mb_strtoupper($this->collective_representant_name)),
                'name' => trim(mb_strtoupper($this->collective_name)),
                'registered_at' => $this->collective_registered_at,
                'participants_total' => $this->collective_participants_total,
                'responsable_name' => trim(mb_strtoupper($this->collective_responsable_name)),
                'phone' => $this->phone,
                'city_id' => $this->city_id,
                'address' => $this->collective_address,
            ]);

            $customer->update([
                'agent_collective_without_cnpj_id' => $agentCollective->id
            ]);
        }

        if ($customer->type_agent_id === TypeAgentEnum::MEI) {
            $agentMEI = MEI::create($this->payloadEntity($customer));
            $customer->update(['agent_mei_id' => $agentMEI->id]);
        }

        if ($customer->type_agent_id === TypeAgentEnum::PJ_WITH_PROFIT) {
            $agentPJWithProfit = PJWithProfit::create($this->payloadEntity($customer));
            $customer->update(['agent_pj_with_profit_id' => $agentPJWithProfit->id]);
        }

        if ($customer->type_agent_id === TypeAgentEnum::PJ_WITHOUT_PROFIT) {
            $agentPJWithoutProfit = PJWithoutProfit::create($this->payloadEntity($customer));
            $customer->update(['agent_pj_without_profit_id' => $agentPJWithoutProfit->id]);
        }
    }

    private function payloadEntity(Customer $customer): array
    {
        return [
            'customer_id' => $customer->id,
            'tenant_id' => session('tenant_id'),
            'cnpj' => $this->entity_cnpj,
            'organization_name' => trim(mb_strtoupper($this->entity_organization_name)),
            'company_name' => trim(mb_strtoupper($this->entity_company_name)),
            'registered_at' => $this->entity_registered_at,
            'representant_name' => trim(mb_strtoupper($this->entity_representant_name)),
            'representant_cpf' => $this->entity_representant_cpf,
            'city_id' => $this->city_id,
            'address' => trim(mb_strtoupper($this->entity_address)),
            'phone' => $this->phone,
            'responsible_name' => trim(mb_strtoupper($this->entity_responsable_name)),
        ];
    }

    public function message(): string
    {
        return $this->isMethod('POST')
            ? "Agente cultural <strong>cadastrado</strong> com sucesso!"
            : "Agente cultural <strong>alterado</strong> com sucesso!";
    }

    private function validateAgentPF(): array
    {
        return [
            'name' => ['required', 'max:191'],
            'cpf' => ['required', 'size:14'],
            'date_of_birth' => ['required', 'date'],
            'rg' => ['required', 'max:191'],
            'nickname' => ['nullable', 'max:100'],
            'gender_id' => ['required', 'integer'],
            'breed_id' => ['required', 'integer'],
            'is_lgbt' => ['required', 'integer'],
            'schooling_id' => ['required', 'integer'],
            'income' => ['required', 'max:191'],
            'area_atuation_id' => ['required', 'integer'],
            'area_atuation_other' => ['nullable', 'max:191'],
            'community_traditional_id' => ['required', 'integer'],
            'is_pcd' => ['nullable', 'integer'],
            'deiciency_name' => ['nullable', 'max:191'],
            'is_beneficiary_program_social' => ['nullable', 'integer'],
            'city_id' => ['required', 'integer'],
            'address' => ['nullable', 'max:191'],
            'phone' => ['nullable', 'max:100'],
            'responsible_name' => ['required', 'max:191'],
            'email' => ['required', 'max:191'],
            'password' => ['required', 'max:191'],
        ];
    }

    private function validateCollective(): array
    {
        return [
            'agent_type_collective_without_cnpj' => ['required', 'integer'],
            'collective_representant_cpf' => ['required', 'size:14'],
            'collective_representant_name' => ['required', 'max:191'],
            'collective_name' => ['required', 'max:191'],
            'collective_registered_at' => ['required', 'date'],
            'collective_participants_total' => ['required', 'integer'],
            'collective_responsable_name' => ['required', 'max:191'],
            'phone' => ['required', 'max:100'],
            'city_id' => ['required', 'integer'],
            'collective_address' => ['required', 'max:191'],
            'email' => ['required', 'max:191'],
            'password' => ['required', 'max:191'],
        ];
    }

    private function validateEntity(): array
    {
        return [
            'agent_type_pj_with_profit' => ['nullable', 'integer'],
            'agent_type_pj_without_profit' => ['nullable', 'integer'],
            'agent_type_mei' => ['nullable', 'integer'],
            'entity_cnpj' => ['required', 'max:191'],
            'entity_organization_name' => ['required', 'max:191'],
            'entity_company_name' => ['required', 'max:191'],
            'entity_registered_at' => ['required', 'date'],
            'entity_representant_name' => ['required', 'max:191'],
            'entity_representant_cpf' => ['required', 'max:191'],
            'city_id' => ['required', 'integer'],
            'entity_address' => ['required', 'max:191'],
            'phone' => ['required', 'max:191'],
            'entity_responsable_name' => ['required', 'max:191'],
            'email' => ['required', 'max:191'],
            'password' => ['required', 'max:191'],
        ];
    }

    private function convertDateOfBirth(string $dateOfBirth): string
    {
        return \Carbon\Carbon::createFromFormat('d/m/Y', $dateOfBirth)->format('Y-m-d');
    }
}
