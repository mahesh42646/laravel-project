<?php

namespace App\Enums\Shared;

enum SchoolingEnum: int
{
    case NAO_TENHO_EDUCACAO_FORMAL = 1;
    case ENSINO_FUNDAMENTAL_INCOMPLETO = 2;
    case ENSINO_FUNDAMENTAL_COMPLETO = 3;
    case ENSINO_MEDIO_INCOMPLETO = 4;
    case ENSINO_MEDIO_COMPLETO = 5;
    case CURSO_TECNICO_COMPLETO = 6;
    case ENSINO_SUPERIOR_INCOMPLETO = 7;
    case ENSINO_SUPERIOR_COMPLETO = 8;
    case POS_GRADUACAO_EM_CURSO = 9;
    case POS_GRADUACAO_COMPLETO = 10;

    public function getName(): string
    {
        return match($this) {
            static::NAO_TENHO_EDUCACAO_FORMAL => 'Não tenho educação formal',
            static::ENSINO_FUNDAMENTAL_INCOMPLETO => 'Ensino Fundamental incompleto',
            static::ENSINO_FUNDAMENTAL_COMPLETO => 'Ensino Fundamental completo',
            static::ENSINO_MEDIO_INCOMPLETO => 'Ensino Médio incompleto',
            static::ENSINO_MEDIO_COMPLETO => 'Ensino Médio completo',
            static::CURSO_TECNICO_COMPLETO => 'Curso Técnico completo',
            static::ENSINO_SUPERIOR_INCOMPLETO => 'Ensino Superior incompleto',
            static::ENSINO_SUPERIOR_COMPLETO => 'Ensino Superior completo',
            static::POS_GRADUACAO_EM_CURSO => 'Pós graduação em curso',
            static::POS_GRADUACAO_COMPLETO => 'Pós graduação completo',
        };
    }

    public static function toArray(): array
    {
        return array_map(fn ($schooling) => [
            'id' => $schooling->value,
            'name' => $schooling->getName(),
        ], static::cases());
    }
}
