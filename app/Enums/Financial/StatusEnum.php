<?php

namespace App\Enums\Financial;

enum StatusEnum: int
{
    case PENDING = 0;
    case PAID = 1;

    public function getTitle(): string
    {
        return match($this) {
            static::PENDING => 'Pendente',
            static::PAID => 'Pago',
        };
    }

    public function getIcon(): string
    {
        return match($this) {
            static::PENDING => '<span class="font-size-20 mdi mdi-clock-outline mr-2" title="Pendente" style="color: #e2a32e"></span>',
            static::PAID => '<span class="font-size-20 mdi mdi-check-circle mr-2" title="Pago" style="color: #00af53"></span>',
        };
    }
}
