<?php

namespace App\Enums\Project;

enum ProfilePriorityEnum: int
{
    case PEOPLE_VICTIM_VIOLENCY = 1;
    case PEOPLE_SITUATION_POBREZ = 2;
    case PEOPLE_HOME_LESS = 3;
    case PEOPLE_RESTRICT = 4;
    case PEOPLE_PCD = 5;
    case PEOPLE_SOFRIMENT = 6;
    case WOMEN = 7;
    case LGBTQIAPN = 8;
    case COMMUNITY_TRADITIONAL = 9;
    case BLACK = 10;
    case CIGAN = 11;
    case INDIGEN = 12;
    case ALL = 13;
    case OTHER = 14;

    public function getName(): string
    {
        return match($this) {
            static::PEOPLE_VICTIM_VIOLENCY => 'Pessoas vítimas de violência',
            static::PEOPLE_SITUATION_POBREZ => 'Pessoas em situação de pobreza',
            static::PEOPLE_HOME_LESS => 'Pessoas em situação de rua (moradores de rua)',
            static::PEOPLE_RESTRICT => 'Pessoas em situação de restrição e privação de liberdade (população carcerária)',
            static::PEOPLE_PCD => 'Pessoas com deficiência',
            static::PEOPLE_SOFRIMENT => 'Pessoas em sofrimento físico e/ou psíquico',
            static::WOMEN => 'Mulheres',
            static::LGBTQIAPN => 'LGBTQIAPN+',
            static::COMMUNITY_TRADITIONAL => 'Povos e comunidades tradicionais',
            static::BLACK => 'Negros e/ou negras',
            static::CIGAN => 'Ciganos',
            static::INDIGEN => 'Indígenas',
            static::ALL => 'Não é voltada especificamente para um perfil, é aberta para todos',
            static::OTHER => 'Outros, indicar qual',
        };
    }
}
