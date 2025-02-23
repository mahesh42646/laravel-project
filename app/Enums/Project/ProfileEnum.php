<?php

namespace App\Enums\Project;

enum ProfileEnum: int
{
    case KID = 1;
    case ADULT = 2;
    case OLD = 3;
    case LGBT = 4;
    case ALL = 5;

    public function getName(): string
    {
        return match($this) {
            static::KID => 'Crianças',
            static::ADULT => 'Adultas',
            static::OLD => 'Idosas',
            static::LGBT => 'Lgbt',
            static::ALL => 'Todos',
        };
    }
}
