<?php

namespace App\Enums\Shared;

enum BooleanEnum: int
{
    case NOT = 0;
    case YES = 1;

    public function getName(): string
    {
        return match($this) {
            static::NOT => 'Não',
            static::YES => 'Sim',
        };
    }

    public function getDefaultName(): string
    {
        return match($this) {
            static::NOT => 'not',
            static::YES => 'yes',
        };
    }

    public function getColor(): string
    {
        return match($this) {
            static::NOT => 'alert-danger rounded-pill px-3 py-1 fw-600',
            static::YES => 'alert-success rounded-pill px-3 py-1 fw-600',
        };
    }
}
