<?php

namespace App\Enums\Customer;

enum CommunityTraditionalEnum: int
{
    case NAO_PERTENCO_A_COMUNIDADE_TRADICIONAL = 1;
    case COMUNIDADE_EXTRATIVISTA = 2;
    case COMUNIDADE_RIBEIRINHA = 3;
    case COMUNIDADE_RURAL = 4;
    case INDIGENAS = 5;
    case POVOS_CIGANOS = 6;
    case PESCADORES_ARTESANAIS = 7;
    case POVOS_DE_TERREIRO = 8;
    case QUILOMBOLAS = 9;
    case OUTRA_COMUNIDADE_TRADICIONAL = 99;

    public function getName(): string
    {
        return match($this) {
            static::NAO_PERTENCO_A_COMUNIDADE_TRADICIONAL => 'Não pertenço a comunidade tradicional',
            static::COMUNIDADE_EXTRATIVISTA => 'Comunidade extrativista',
            static::COMUNIDADE_RIBEIRINHA => 'Comunidade ribeirinha',
            static::COMUNIDADE_RURAL => 'Comunidade rural',
            static::INDIGENAS => 'Indígenas',
            static::POVOS_CIGANOS => 'Povos ciganos',
            static::PESCADORES_ARTESANAIS => 'Pescadores(as) artesanais',
            static::POVOS_DE_TERREIRO => 'Povos de terreiro',
            static::QUILOMBOLAS => 'Quilombolas',
            static::OUTRA_COMUNIDADE_TRADICIONAL => 'Outra comunidade tradicional',
        };
    }

    public static function toArray(): array
    {
        return array_map(fn ($community) => [
            'id' => $community->value,
            'name' => $community->getName(),
        ], static::cases());
    }
}
