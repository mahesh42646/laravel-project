<?php

namespace App\Enums\Project\Diligence;

enum SenderEnum: int
{
    case PROFESSIONAL = 1;
    case CUSTOMER = 2;

    public function getName(): string
    {
        return match($this) {
            static::PROFESSIONAL => 'Profissional',
            static::CUSTOMER => 'Artista',
        };
    }
}
