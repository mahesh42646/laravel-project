<?php

namespace App\Http\Requests\Tenant\Customer;

use App\Enums\Customer\TypeAgentEnum;
use App\Helpers\Fill;
use App\Models\Customer\Customer;
use App\Models\Customer\Type\Collective;
use App\Models\Customer\Type\MEI;
use App\Models\Customer\Type\PF;
use App\Models\Customer\Type\PJWithoutProfit;
use App\Models\Customer\Type\PJWithProfit;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

final class CustomerUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        if ($this->type_agent_id == TypeAgentEnum::PF->value) {
            return [
                'cpf' => ['required'],
                'date_of_birth' => ['required', 'date'],
                'name' => ['required', 'max:191'],
                'rg' => ['required', 'max:191'],
                'nickname' => ['nullable', 'max:100'],
                'gender_id' => ['required', 'integer'],
                'breed_id' => ['required', 'integer'],
                'is_lgbt' => ['required', 'integer'],
                'schooling_id' => ['required', 'integer'],
                'income' => ['required'],
                'area_atuation_id' => ['required'],
                'area_atuation_other' => ['nullable', 'max:191'],
                'community_traditional_id' => ['required', 'max:191'],
                'is_pcd' => ['required'],
                'deiciency_name' => ['required', 'max:191'],
                'is_beneficiary_program_social' => ['required'],
                'address' => ['required', 'max:191'],
                'phone' => ['required', 'max:191'],
                'responsible_name' => ['required', 'max:191'],
                'email' => ['required', 'email', 'max:191'],
            ];
        }

        if (
            $this->type_agent_id == TypeAgentEnum::MEI->value || 
            $this->type_agent_id == TypeAgentEnum::PJ_WITH_PROFIT->value ||
            $this->type_agent_id == TypeAgentEnum::PJ_WITHOUT_PROFIT->value
        ) {
            return [
                'cnpj' => ['required'],
                'organization_name' => ['required', 'max:191'],
                'company_name' => ['required', 'max:191'],
                'registered_at' => ['required', 'date'],
                'representant_name' => ['nullable', 'max:100'],
                'representant_cpf' => ['required', 'max:50'],
                'city_id' => ['required', 'integer'],
                'address' => ['required', 'max:191'],
                'phone' => ['required', 'max:191'],
                'responsible_name' => ['required', 'max:191'],
                'email' => ['required', 'email', 'max:191'],
            ];
        }

        DD(
            $this->all(),
        );
        
        if (
            $this->isMethod('POST') && 
            ($this->agent_type_pj_with_profit || 
            $this->agent_type_mei || 
            $this->agent_type_pj_without_profit)
        ) {
            return $this->validateEntity();
        }

        $customerId = $this->customer->id;

        return [
            'type' => ['required', 'size:2'],
            'cpf' => ['required', 'size:14',
                Rule::unique('customers')
                    ->where(fn (Builder $query) => $query->where('tenant_id', session('tenant_id')))
                    ->ignore($customerId)
            ],
            'cnpj' => ['nullable', 'size:18', 
                Rule::unique('customers')
                    ->where(fn (Builder $query) => $query->where('tenant_id', session('tenant_id')))
                    ->ignore($customerId)
            ],
            'company_name' => ['nullable', 'max:191'],
            'rg' => ['required', 'max:191'], 
            'name' => ['required', 'max:191'],
            'gender_id' => ['required', 'integer'],
            'name_social' => ['nullable', 'max:100'],
            'breed_id' => ['required', 'integer'],
            'is_lgbt' => ['required', 'integer'],
            'schooling_id' => ['required', 'integer'],
            'income' => ['required', 'numeric'],
            'area_atuation_id' => ['required', 'integer'],
            'area_atuation_other' => ['nullable', 'max:191'],
            'community_traditional_id' => ['nullable', 'integer'],
            'city' => ['required', 'max:191'],
            'address' => ['nullable', 'max:191'],
            'phone' => ['required', 'size:15'],
            'email' => ['required', 'max:100'],
            'is_active' => ['nullable', 'integer'],
            'profile_photo_update' => ['nullable', File::image()->max('10mb')],
            'cover_photo_update' => ['nullable', File::image()->max('10mb')],
        ];
    }

    public function attributes(): array
    {
        return [
            'type_agent' => '<strong>tipo de agente</strong>',
            'cpf' => '<strong>CPF</strong>',
            'cnpj' => '<strong>CNPJ</strong>',
            'company_name' => '<strong>nome da empresa</strong>',
            'rg' => '<strong>RG</strong>',
            'name' => '<strong>nome completo</strong>',
            'gender_id' => '<strong>gênero</strong>',
            'name_social' => '<strong>nome social</strong>',
            'breed_id' => '<strong>raça</strong>',
            'is_lgbt' => '<strong>você é LGBTQIAPN+?</strong>',
            'schooling_id' => '<strong>escolaridade</strong>',
            'income' => '<strong>renda individual</strong>',
            'area_atuation_id' => '<strong>principal área de atuação</strong>',
            'area_atuation_other' => '<strong>outras áreas de atuação</strong>',
            'community_traditional_id' => '<strong>comunidades tradicionais</strong>',
            'city' => '<strong>cidade</strong>',
            'address' => '<strong>endereço completo</strong>',
            'phone' => '<strong>telefone</strong>',
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
            'email' => $this->email,
        ];
    }

    public function bindAgent(Customer $customer): void
    {
        if ($customer->type_agent_id === TypeAgentEnum::PF) {
            $customer->agent_pf->update([
                'name' => trim(mb_strtoupper($this->name)),
                'cpf' => $this->cpf,
                'date_of_birth' => $this->date_of_birth,
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
                'responsable_name' => trim(mb_strtoupper($this->responsible_name)), 
            ]);
        }

        // if ($customer->type_agent_id === TypeAgentEnum::COLLECTIVE) {
        //     $agentCollective = Collective::create([
        //         'customer_id' => $customer->id,
        //         'tenant_id' => session('tenant_id'),
        //         'representant_cpf' => $this->collective_representant_cpf,
        //         'representant_name' => trim(mb_strtoupper($this->collective_representant_name)),
        //         'name' => trim(mb_strtoupper($this->collective_name)),
        //         'registered_at' => $this->collective_registered_at,
        //         'participants_total' => $this->collective_participants_total,
        //         'responsable_name' => trim(mb_strtoupper($this->collective_responsable_name)),
        //         'phone' => $this->phone,
        //         'city_id' => $this->city_id,
        //         'address' => $this->collective_address,
        //     ]);

        //     $customer->update([
        //         'agent_collective_without_cnpj_id' => $agentCollective->id
        //     ]);
        // }

        if ($customer->type_agent_id === TypeAgentEnum::MEI) {
            $customer->agent_mei->update([
                'cnpj' => $this->cnpj,
                'organization_name' => trim(mb_strtoupper($this->organization_name)),
                'company_name' => trim(mb_strtoupper($this->company_name)),
                'registered_at' => $this->registered_at,
                'representant_name' => trim(mb_strtoupper($this->representant_name)),
                'representant_cpf' => $this->representant_cpf,
                'city_id' => $this->city_id,
                'address' => trim(mb_strtoupper($this->address)),
                'phone' => $this->phone,
                'responsible_name' => trim(mb_strtoupper($this->responsible_name)),
            ]);
        }

        if ($customer->type_agent_id === TypeAgentEnum::PJ_WITH_PROFIT) {
            $customer->agent_pj_with_profit->update([
                'cnpj' => $this->cnpj,
                'organization_name' => trim(mb_strtoupper($this->organization_name)),
                'company_name' => trim(mb_strtoupper($this->company_name)),
                'registered_at' => $this->registered_at,
                'representant_name' => trim(mb_strtoupper($this->representant_name)),
                'representant_cpf' => $this->representant_cpf,
                'city_id' => $this->city_id,
                'address' => trim(mb_strtoupper($this->address)),
                'phone' => $this->phone,
                'responsible_name' => trim(mb_strtoupper($this->responsible_name)),
            ]);
        }

        if ($customer->type_agent_id === TypeAgentEnum::PJ_WITHOUT_PROFIT) {
            $customer->agent_pj_without_profit->update([
                'cnpj' => $this->cnpj,
                'organization_name' => trim(mb_strtoupper($this->organization_name)),
                'company_name' => trim(mb_strtoupper($this->company_name)),
                'registered_at' => $this->registered_at,
                'representant_name' => trim(mb_strtoupper($this->representant_name)),
                'representant_cpf' => $this->representant_cpf,
                'city_id' => $this->city_id,
                'address' => trim(mb_strtoupper($this->address)),
                'phone' => $this->phone,
                'responsible_name' => trim(mb_strtoupper($this->responsible_name)),
            ]);
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
            'responsable_name' => trim(mb_strtoupper($this->entity_responsable_name)),
        ];
    }

    public function message(): string
    {
        return "Os dados do agente cultural foram <strong>atualizados</strong> com sucesso!";
    }

    private function validateAgentPF(): array
    {
        return [
            'agent_type_pf' => ['required', 'integer'],
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
            'deiciency_name' => ['required', 'max:191'],
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

    private function getTypeAgentId(): int
    {
        return match (true) {
            $this->agent_type_pf === '1' => 1,
            $this->agent_type_collective_without_cnpj === '2' => 2,
            $this->agent_type_pj_with_profit === '3' => 3,
            $this->agent_type_mei === '4' => 4,
            $this->agent_type_pj_without_profit === '5' => 5,
            default => 1,
        };
    }
}
