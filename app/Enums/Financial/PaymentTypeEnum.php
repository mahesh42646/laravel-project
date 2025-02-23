<?php

namespace App\Enums\Financial;

enum PaymentTypeEnum: int
{
    case MONEY = 1;
    case PIX = 2;
    case CARD = 3;
    case BOLETO = 4;
    case OTHER = 99;

    public function getName(): string
    {
        return match($this) {
            static::MONEY => 'Dinheiro',
            static::PIX => 'Pix',
            static::CARD => 'Cartão',
            static::BOLETO => 'Boleto',
            static::OTHER => 'Outra forma',
        };
    }
}
