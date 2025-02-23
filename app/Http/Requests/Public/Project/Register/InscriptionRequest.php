<?php

namespace App\Http\Requests\Public\Project\Register;

use App\Enums\Edital\TypeEnum as Type;
use Illuminate\Foundation\Http\FormRequest;

final class InscriptionRequest extends FormRequest
{
    public function rules(): array
    {
        if ($this->edital_type_id == Type::NORMAL->value) {
            return [
                'inscription_has_quota' => ['required', 'integer'],
                'inscription_quota_id' => ['nullable', 'integer'],
                'inscription_profile_id' => ['required', 'integer'],
                'inscription_profile_priority_id' => ['required', 'integer'],
                'inscription_profile_priority_other' => ['nullable', 'max:100'],
                'accessibilities' => ['nullable', 'array'],
                'accessibility_arquitetonics' => ['nullable', 'array'],
                'inscription_accessibility_arquitetonic_other' => ['nullable', 'max:191'],
                'accessibility_communicationals' => ['nullable', 'array'],
                'inscription_accessibility_communicational_other' => ['nullable', 'max:191'],
                'accessibility_atitudinals' => ['nullable', 'array'],
                'inscription_accessibility_atitudinal_other' => ['nullable', 'max:191'],
                'inscription_accessibility_description' => ['nullable', 'max:191'],
                'inscription_local_execution' => ['required', 'max:100'],
                'inscription_local_execution_started_at' => ['required', 'date'],
                'inscription_local_execution_finished_at' => ['required', 'date'],
                'inscription_strategy_description' => ['nullable', 'max:100'],
                'strategies' => ['nullable', 'array'],
            ];
        }

        return [
            'inscription_has_quota' => ['required', 'integer'],
            'inscription_quota_id' => ['nullable', 'integer'],
            'trajectory_main_actions' => ['nullable', 'max:191'],
            'trajectory_initial' => ['nullable', 'max:191'],
            'trajectory_other_actions' => ['nullable', 'max:191'],
        ];
    }

    public function attributes(): array
    {
        return [
            'inscription_has_quota' => '<strong>Vai concorrer as cotas?</strong>',
            'inscription_quota_id' => '<strong>Em qual cota vai concorrer?</strong>',
            'inscription_profile_id' => '<strong>Perfil do público a ser atingido pelo projeto</strong>',
            'inscription_profile_priority_id' => '<strong>Sua ação cultural é voltada prioritariamente para algum destes perfis de público?</strong>',
            'inscription_profile_priority_other' => '<strong>Outra (Indicar qual)</strong>',
            'accessibilities' => '<strong>Medidas de acessibilidade empregadas no projeto</strong>',
            'accessibility_arquitetonics' => '<strong>Acessibilidade arquitetônica</strong>',
            'inscription_accessibility_arquitetonic_other' => '<strong>Acessibilidade arquitetônica (outra)</strong>',
            'accessibility_communicationals' => '<strong>Acessibilidade comunicacional</strong>',
            'inscription_accessibility_communicational_other' => '<strong>Acessibilidade comunicacional (outra)</strong>',
            'accessibility_atitudinals' => '<strong>Acessibilidade atitudinal</strong>',
            'inscription_accessibility_atitudinal_other' => '<strong>Acessibilidade atitudinal (outra)</strong>',
            'inscription_accessibility_description' => '<strong>Informe como essas medidas de acessibilidade serão implementadas ou disponibilizadas de acordo com o projeto proposto</strong>',
            'inscription_local_execution' => '<strong>Local onde o projeto será executado</strong>',
            'inscription_local_execution_started_at' => '<strong>Data de início</strong>',
            'inscription_local_execution_finished_at' => '<strong>Data final</strong>',
            'inscription_strategy_description' => '<strong>Estratégia de divulgação</strong>',
            'strategies' => '<strong>Estratégias de divulgação</strong>',
            'trajectory_main_actions' => '<strong>Quais são as suas principais ações e atividades culturais realizadas?</strong>',
            'trajectory_initial' => '<strong>Como começou a sua trajetória cultural?</strong>',
            'trajectory_other_actions' => '<strong>Na sua trajetória cultural, você desenvolveu ações e projetos com outras esferas de conhecimento, tais como educação, saúde, etc?</strong>',
        ];
    }

    public function payload(): array
    {
        if ($this->edital_type_id == Type::NORMAL->value) {
            return [
                'inscription_has_quota' => $this->inscription_has_quota,
                'inscription_quota_id' => $this->inscription_quota_id,
                'inscription_profile_id' => $this->inscription_profile_id,
                'inscription_profile_priority_id' => $this->inscription_profile_priority_id,
                'inscription_profile_priority_other' => $this->inscription_profile_priority_other,
                'inscription_accessibility_arquitetonic_other' => $this->inscription_accessibility_arquitetonic_other,
                'inscription_accessibility_communicational_other' => $this->inscription_accessibility_communicational_other,
                'inscription_accessibility_atitudinal_other' => $this->inscription_accessibility_atitudinal_other,
                'inscription_accessibility_description' => $this->inscription_accessibility_description,
                'inscription_local_execution' => $this->inscription_local_execution,
                'inscription_local_execution_started_at' => $this->inscription_local_execution_started_at,
                'inscription_local_execution_finished_at' => $this->inscription_local_execution_finished_at,
                'inscription_strategy_description' => $this->inscription_strategy_description,
            ];
        }

        return [
            'inscription_has_quota' => $this->inscription_has_quota,
            'inscription_quota_id' => $this->inscription_quota_id,
            'trajectory_main_actions' => $this->trajectory_main_actions,
            'trajectory_initial' => $this->trajectory_initial,
            'trajectory_other_actions' => $this->trajectory_other_actions,
        ];
    }

    public function message(): string
    {
        return $this->isMethod('POST')
            ? "Inscrição do projeto <strong>registrada</strong> com sucesso!"
            : "Inscrição do projeto <strong>atualizada</strong> com sucesso!";
    }
}
