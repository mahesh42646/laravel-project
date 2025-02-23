<?php

namespace App\Enums\Edital;

enum TypeEnum: int
{
    case NORMAL = 1;
    case WINNING = 2;

    public function getName(): string
    {
        return match($this) {
            static::NORMAL => 'Normal',
            static::WINNING => 'Premiado',
        };
    }
}
