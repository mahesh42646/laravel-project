<?php

namespace App\Enums\Edital;

enum RegisterTypeEnum: int
{
    case CITY = 1;
    case STATE = 2;
    case NATIONAL = 3;

    public function getName(): string
    {
        return match($this) {
            static::CITY => 'Municipal',
            static::STATE => 'Estadual',
            static::NATIONAL => 'Nacional',
        };
    }
}
