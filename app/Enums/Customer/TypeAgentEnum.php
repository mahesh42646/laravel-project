<?php

namespace App\Enums\Customer;

enum TypeAgentEnum: int
{
    case PF = 1;
    case COLLECTIVE = 2;
    case PJ_WITH_PROFIT = 3;
    case PJ_WITHOUT_PROFIT = 4;
    case MEI = 5;

    public function getName(): string
    {
        return match($this) {
            static::PF => 'Pessoa física',
            static::COLLECTIVE => 'Coletivo sem CNPJ',
            static::PJ_WITH_PROFIT => 'Pessoa jurídica com fins lucrativos',
            static::PJ_WITHOUT_PROFIT => 'Pessoa jurídica sem fins lucrativos',
            static::MEI => 'MEI',
        };
    }
}
