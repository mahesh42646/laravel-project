<?php

namespace App\Services\Project\Analyze;

use App\Enums\Edital\TypeEnum;
use App\Models\Project\Project;
use App\Models\SuperAdmin\Tenant\Tenant;
use App\Traits\Pdf\ConfigPdf;
use App\Traits\Pdf\HeaderPdf;

final class PrintService
{
    use HeaderPdf, ConfigPdf;
    
    public function prepare(Tenant $tenant, string $title): void
    {
        $this->config($title);
        $this->header($tenant->name, $tenant->company->name, $title);
    }

    public function getIdentificationProponentContent(Project $project): string
    { 
        $customer = $project->customer;

        if ($customer->agent_pf_id) {
            $pf = $customer->agent_pf;

            return <<<HTML
                <br>
                <div style="text-align: center; font-size: 6mm;"><strong>Identificação do proponente</strong></div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Dados pessoais:</strong></div>
                <div>
                    <strong>Nome Completo:</strong> {$pf->name}<br>
                    <strong>CPF:</strong> {$pf->cpf}<br>
                    <strong>Data de nascimento:</strong> {$pf->date_of_birth?->format('d/m/Y')}<br>
                    <strong>RG:</strong> {$pf->rg}<br>
                    <strong>Nome Social:</strong> {$pf->nickname}<br>
                    <strong>Gênero:</strong> {$pf->gender_id?->getName()}<br>
                    <strong>Raça:</strong> {$pf->breed_id?->getName()}<br>
                    <strong>Escolaridade:</strong> {$pf->schooling_id?->getName()}<br>
                </div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Trabalho e Renda:</strong></div>
                <div>
                    <strong>Renda Individual:</strong> {$pf->income_masked}<br>
                    <strong>Principal área de atuação:</strong> {$pf->area_atuation_id?->getName()}<br>
                    <strong>Outras áreas de atuação:</strong> {$pf->area_atuation_other}<br>
                </div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Deficiência:</strong></div>
                <div>
                    <strong>Você tem deficiência PCD?</strong> {$pf->is_pcd?->getName()}<br>
                    <strong>Em caso de PCD, qual?</strong> {$pf->deiciency_name}<br>
                </div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Complementos:</strong></div>
                <div>
                    <strong>Você é LGBTQIAPN+?</strong> {$pf->is_lgbt?->getName()}<br>
                    <strong>Comunidades tradicionais:</strong> {$pf->community_traditional_id?->getName()}<br>
                    <strong>Beneficiário de algum programa social?</strong> {$pf->is_beneficiary_program_social?->getName()}<br>
                    <strong>Nome do responsável pelo cadastro:</strong> {$pf->responsible_name}<br>
                </div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Endereço:</strong></div>
                <div>
                    <strong>Endereço completo:</strong> {$pf->address}<br>
                    <strong>Cidade:</strong> {$pf->city?->name}<br>
                    <strong>Telefone</strong> {$pf->phone}<br>
                </div>
                <hr>

                <div style="text-align: center"><strong>Última realização do projeto realizada em:</strong></div>
                <span style="text-align: center">{$project->updated_at?->format('d/m/Y H:i:s')}</span>
            HTML;
        }
    }

    public function getInscriptionProjectContent(Project $project): string
    {
        if ($project->edital->type_id === TypeEnum::NORMAL) {
            return <<<HTML
                <br>
                <div style="text-align: center; font-size: 6mm;"><strong>Inscrição do projeto (Edital Fomento)</strong></div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Cotas:</strong></div>
                <div>
                    <strong>Vai concorrer as cotas?</strong> {$project->inscription_has_quota?->getName()}<br>
                    <strong>Em qual cota vai concorrer?</strong> {$project->inscription_quota?->name}<br>
                </div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Dados do perfil:</strong></div>
                <div>
                    <strong>Perfil do público a ser atingido pelo projeto:</strong> {$project->inscription_profile_id?->getName()}<br>
                    <strong>Sua ação cultural é voltada prioritariamente para algum destes perfis de público?</strong> {$project->inscription_profile_priority_id?->getName()}<br>
                    <strong>Se outro perfil (Indicar qual):</strong> {$project->inscription_profile_priority_other}<br>
                </div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Acessibilidade:</strong></div>
                <div>
                    <strong>Medidas de acessibilidade empregadas no projeto:</strong> {$project->inscription_accessibilities->pluck('name')->implode(', ')}<br>
                    <strong>Se outra medida de acessibilidade, qual?</strong> {$project->inscription_accessibility_other}<br>
                    <strong>Acessibilidade arquitetônica:</strong> {$project->inscription_accessibility_arquitetonics->pluck('name')->implode(', ')}<br>
                    <strong>Se outro tipo de acessibilidade arquitetônica, qual?</strong> {$project->inscription_accessibility_arquitetonic_other}<br>
                    <strong>Acessibilidade comunicacional:</strong> {$project->inscription_accessibility_communicationals->pluck('name')->implode(', ')}<br>
                    <strong>Se outro tipo de acessibilidade comunicacional, qual?</strong> {$project->inscription_accessibility_communicational_other}<br>
                    <strong>Acessibilidade atitudinal:</strong> {$project->inscription_accessibility_atitudinals->pluck('name')->implode(', ')}<br>
                    <strong>Se outro tipo de acessibilidade atitudinal, qual?</strong> {$project->inscription_accessibility_atitudinal_other}<br>
                    <strong>Informe como essas medidas de acessibilidade serão implementadas ou disponibilizadas de acordo com o projeto proposto:</strong> {$project->inscription_accessibility_description}<br>
                </div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Local e período de execução do projeto:</strong></div>
                <div>
                    <strong>Local onde o projeto será executado:</strong> {$project->inscription_local_execution}<br>
                    <strong>Data de início:</strong> {$project->inscription_local_execution_started_at?->format('d/m/Y')}<br>
                    <strong>Data final:</strong> {$project->inscription_local_execution_finished_at?->format('d/m/Y')}<br>
                </div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Estratégia de divulgação:</strong></div>
                <div>
                    <strong>Estratégia de divulgação:</strong> {$project->inscription_strategy_description}<br>
                    <strong>Estratégias:</strong> {$project->inscription_strategies->pluck('name')->implode(', ')}<br>
                </div>
                <hr>

                <div style="text-align: center"><strong>Última realização do projeto realizada em:</strong></div>
                <span style="text-align: center">{$project->updated_at?->format('d/m/Y H:i:s')}</span>
            HTML;
        }

        return <<<HTML
            <br>
            <div style="text-align: center; font-size: 6mm;"><strong>Inscrição do projeto (Edital Prêmio)</strong></div>
            <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Cotas:</strong></div>
            <div>
                <strong>Vai concorrer as cotas?</strong> {$project->inscription_has_quota?->getName()}<br>
                <strong>Em qual cota vai concorrer?</strong> {$project->inscription_quota?->name}<br>
            </div>
            <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Ações:</strong></div>
            <div>
                <strong>Quais são as suas principais ações e atividades culturais realizadas?</strong> {$project->trajectory_main_actions}<br>
                <strong>Como começou a sua trajetória cultural?</strong> {$project->trajectory_initial}<br>
                <strong>Na sua trajetória cultural, você desenvolveu ações e projetos com outras esferas de conhecimento, tais como educação, saúde, etc?</strong> {$project->trajectory_other_actions}<br>
            </div>
            <hr>

            <div style="text-align: center"><strong>Última realização do projeto realizada em:</strong></div>
            <span style="text-align: center">{$project->updated_at?->format('d/m/Y H:i:s')}</span>
        HTML;
    }

    public function getIdentificationProjectContent(Project $project): string
    {
        return <<<HTML
            <br>
            <div style="text-align: center; font-size: 6mm;"><strong>Identificação do projeto</strong></div>
            <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Identificação:</strong></div>
            <div>
                <strong>Categoria:</strong> {$project->identification_category?->name}<br>
                <strong>Nome:</strong> {$project->identification_name}<br>
                <strong>Valor:</strong> {$project->identification_price_masked}<br>
                <strong>Resumo:</strong> {$project->identification_resume}<br>
                <strong>Descrição:</strong> {$project->identification_description}<br>
                <strong>Objetivo:</strong> {$project->identification_objective}<br>
                <strong>Justificativa:</strong> {$project->identification_justification}<br>
                <strong>Público alvo:</strong> {$project->identification_target}<br>
                <strong>Cronograma:</strong> {$project->identification_cronogram}<br>
                <strong>Medidas de acessibilidade:</strong> {$project->identification_accessibility}<br>
                <strong>Plano de divulgação:</strong> {$project->identification_plan}<br>
                <strong>Contrapartida social:</strong> {$project->identification_contrapartid_social}<br>
                <strong>Locais previstos para realização da ação cultural:</strong> {$project->identification_local}<br>
            </div>
            <hr>

            <div style="text-align: center"><strong>Última realização do projeto realizada em:</strong></div>
            <span style="text-align: center">{$project->updated_at?->format('d/m/Y H:i:s')}</span>
        HTML;
    }

    public function getComplementProjectContent(Project $project): string
    {
        $links = '';
        $agent  = '';

        $customer = $project->customer;

        if ($customer->agent_pf_id) {
            $pf = $customer->agent_pf;
            $agent = <<<HTML
                <br>
                <div style="text-align: center; font-size: 6mm;"><strong>Identificação do proponente</strong></div>
                <div style="background-color: #e2e9f1; font-size: 5mm;"><strong>Dados pessoais:</strong></div>
                <div>
                    <strong>Nome Completo:</strong> {$pf->name}<br>
                    <strong>CPF:</strong> {$pf->cpf}<br>
                    <strong>Data de nascimento:</strong> {$pf->date_of_birth?->format('d/m/Y')}<br>
                    <strong>RG:</strong> {$pf->rg}<br>
                    <strong>Nome Social:</strong> {$pf->nickname}<br>
                    <strong>Gênero:</strong> {$pf->gender_id?->getName()}<br>
                    <strong>Raça:</strong> {$pf->breed_id?->getName()}<br>
                    <strong>Escolaridade:</strong> {$pf->schooling_id?->getName()}<br>
                </div>
                <hr>
            HTML;
        }

        if ($project->customer->social_medias->isNotEmpty()) {
            foreach ($project->customer->social_medias as $index => $socialMedia) {
                $order = $index + 1;
                $links .= <<<HTML
                    <div style="display: flex; align-items: center; font-size: 5mm;">
                        <span class="font-weight-bold mb-0 mr-4" style="font-family: cursive;" data-item-index>{$order}</span>
                        <a href="{$socialMedia->link}" target="_blank">
                            <span><img src="{$socialMedia->media_id->getIcon()}" width="25" height="25">&nbsp;</span>
                            <span>{$socialMedia->link}</span>&nbsp;&nbsp;
                            <span>{$socialMedia->description} &nbsp;</span>
                        </a>
                    </div>
                    <hr class="my-2">
                HTML;
            }
        } else {
            $links = 'Nenhum link foi cadastrado.';
        }

        return <<<HTML
            <br>
            {$agent}
            <div style="text-align: center; font-size: 6mm;"><strong>Links complementares</strong></div>
            {$links}
            <hr>

            <div style="text-align: center"><strong>Última realização do projeto realizada em:</strong></div>
            <span style="text-align: center">{$project->updated_at?->format('d/m/Y H:i:s')}</span>
        HTML;
    }
}
