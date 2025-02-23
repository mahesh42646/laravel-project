<?php

namespace App\Services\Agent;

use App\Enums\Customer\TypeAgentEnum;
use App\Models\Project\Project;

final class InscriptionComprovantService
{
    public function getContent(Project $project): string
    {
        $customer = $project->customer;
        $link = route('public.auth.login');
        $agentContent = $this->getAgentContent($project);

        return <<<HTML
            <br>
            <div style="text-align: center; font-size: 6mm;"><strong>Comprovante de Inscrição</strong></div>
            {$agentContent}
            <div><strong>Atenção!</strong> para acompanhar o andamento do seu projeto, é necessário acessar o seu painel de controle, informando seu e-mail e senha de acesso, através do seguinte link: {$link}</div>
            <br>
            
            Senha de acesso: <strong>{$customer->password}</strong><br>Anote a sua senha em um local seguro.<br>

            <div style="text-align: center"><strong>Inscrição realizada em:</strong></div>
            <span style="text-align: center">{$project->updated_at?->format('d/m/Y H:i:s')}</span>
        HTML;
    }

    private function getAgentContent(Project $project): string
    {
        $customer = $project->customer;

        if ($customer->type_agent_id === TypeAgentEnum::PF) {
            $pf = $customer->agent_pf;

            return <<<HTML
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Tipo de perfil:</strong></div>
                <div><strong>Perfil:</strong> Pessoa Física</div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Dados pessoais:</strong></div>
                <div>
                    <strong>Nome:</strong> {$pf->name}<br>
                    <strong>CPF:</strong> {$pf->cpf}<br>
                    <strong>Data de nascimento:</strong> {$pf->date_of_birth?->format('d/m/Y')}<br>
                    <strong>RG:</strong> {$pf->rg}<br>
                    <strong>Nome Social:</strong> {$pf->nickname}<br>
                    <strong>Gênero:</strong> {$pf->gender_id?->getName()}<br>
                    <strong>Raça:</strong> {$pf->breed_id?->getName()}<br>
                    <strong>Você é LGBTQIAPN+:</strong> {$pf->is_lgbt?->getName()}<br>
                    <strong>Escolaridade:</strong> {$pf->schooling_id?->getName()}<br>
                    <strong>Renda Individual:</strong> R$ {$pf->income}<br>
                    <strong>Você tem deficiência PCD:</strong> {$pf->is_pcd?->getName()}<br>
                </div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Projeto:</strong></div>
                <div>
                    <strong>Nome:</strong> {$project->identification_name}<br>
                    <strong>Valor:</strong> {$project->identification_price}<br>
                    <strong>Principal área de atuação:</strong> {$pf->area_atuation_id?->getName()}<br>
                    <strong>Comunidades tradicionais:</strong> {$pf->community_traditional_id?->getName()}<br>
                    <strong>Beneficiário de algum programa social:</strong> {$pf->is_beneficiary_program_social?->getName()}<br>
                </div>

                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Endereço:</strong></div>
                <div>
                    <strong>Logradouro:</strong> {$pf->address}<br>
                    <strong>Cidade:</strong> {$pf->city?->name}<br>
                    <strong>Telefone:</strong> {$pf->phone}
                </div>
                <hr>
            HTML;
        } elseif ($customer->type_agent_id === TypeAgentEnum::MEI) {
            $mei = $customer->agent_mei;

            return <<<HTML
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Tipo de perfil:</strong></div>
                <div><strong>Perfil:</strong> MEI</div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Dados pessoais:</strong></div>
                <div>
                    <strong>Nome da organização:</strong> {$mei->organization_name}<br>
                    <strong>CNPJ:</strong> {$mei->cnpj}<br>
                    <strong>Empresa:</strong> {$mei->company_name}<br>
                    <strong>Nome do representante:</strong> {$mei->representant_name}<br>
                    <strong>CPF do representante:</strong> {$mei->representant_cpf}<br>
                </div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Projeto:</strong></div>
                <div>
                    <strong>Nome:</strong> {$project->identification_name}<br>
                    <strong>Valor:</strong> {$project->identification_price}<br>
                </div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Endereço:</strong></div>
                <div>
                    <strong>Logradouro:</strong> {$mei->address}<br>
                    <strong>Cidade:</strong> {$mei->city?->name}<br>
                    <strong>Telefone:</strong> {$mei->phone}
                </div>
                <hr>
            HTML;
        } elseif ($customer->type_agent_id === TypeAgentEnum::PJ_WITH_PROFIT) {
            $pjWithProfit = $customer->agent_pj_with_profit;

            return <<<HTML
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Tipo de perfil:</strong></div>
                <div><strong>Perfil:</strong> Pessoa júridica com fins lucrativos</div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Dados pessoais:</strong></div>
                <div>
                    <strong>Nome da organização:</strong> {$pjWithProfit->organization_name}<br>
                    <strong>CNPJ:</strong> {$pjWithProfit->cnpj}<br>
                    <strong>Empresa:</strong> {$pjWithProfit->company_name}<br>
                    <strong>Nome do representante:</strong> {$pjWithProfit->representant_name}<br>
                    <strong>CPF do representante:</strong> {$pjWithProfit->representant_cpf}<br>
                </div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Projeto:</strong></div>
                <div>
                    <strong>Nome:</strong> {$project->identification_name}<br>
                    <strong>Valor:</strong> {$project->identification_price}<br>
                </div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Endereço:</strong></div>
                <div>
                    <strong>Logradouro:</strong> {$pjWithProfit->address}<br>
                    <strong>Cidade:</strong> {$pjWithProfit->city?->name}<br>
                    <strong>Telefone:</strong> {$pjWithProfit->phone}
                </div>
                <hr>
            HTML;
        } elseif ($customer->type_agent_id === TypeAgentEnum::PJ_WITHOUT_PROFIT) {
            $pjWithoutProfit = $customer->agent_pj_without_profit;

            return <<<HTML
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Tipo de perfil:</strong></div>
                <div><strong>Perfil:</strong> Pessoa júridica sem fins lucrativos</div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Dados pessoais:</strong></div>
                <div>
                    <strong>Nome da organização:</strong> {$pjWithoutProfit->organization_name}<br>
                    <strong>CNPJ:</strong> {$pjWithoutProfit->cnpj}<br>
                    <strong>Empresa:</strong> {$pjWithoutProfit->company_name}<br>
                    <strong>Nome do representante:</strong> {$pjWithoutProfit->representant_name}<br>
                    <strong>CPF do representante:</strong> {$pjWithoutProfit->representant_cpf}<br>
                </div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Projeto:</strong></div>
                <div>
                    <strong>Nome:</strong> {$project->identification_name}<br>
                    <strong>Valor:</strong> {$project->identification_price}<br>
                </div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Endereço:</strong></div>
                <div>
                    <strong>Logradouro:</strong> {$pjWithoutProfit->address}<br>
                    <strong>Cidade:</strong> {$pjWithoutProfit->city?->name}<br>
                    <strong>Telefone:</strong> {$pjWithoutProfit->phone}
                </div>
                <hr>
            HTML;
        }

        return '';
    }
}
