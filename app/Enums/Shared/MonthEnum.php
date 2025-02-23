<?php

namespace App\Enums\Shared;

enum MonthEnum: int
{
    case JANUARY = 1;
    case FEBRUARY = 2;
    case MARCH = 3;
    case APRIL = 4;
    case MAY = 5;
    case JUNE = 6;
    case JULY = 7;
    case AUGUST = 8;
    case SEPTEMBER = 9;
    case OCTOBER = 10;
    case NOVEMBER = 11;
    case DECEMBER = 12;

    public function getName(): string
    {
        return match($this) {
            static::JANUARY => 'Janeiro',
            static::FEBRUARY => 'Fevereiro',
            static::MARCH => 'Março',
            static::APRIL => 'Abril',
            static::MAY => 'Maio',
            static::JUNE => 'Junho',
            static::JULY => 'Julho',
            static::AUGUST => 'Agosto',
            static::SEPTEMBER => 'Setembro',
            static::OCTOBER => 'Outubro',
            static::NOVEMBER => 'Novembro',
            static::DECEMBER => 'Dezembro',
        };
    }

    public function getPrevious(): string
    {
        return match($this) {
            static::JANUARY => 'default',
            static::FEBRUARY => 'jan',
            static::MARCH => 'fev',
            static::APRIL => 'mar',
            static::MAY => 'abr',
            static::JUNE => 'mai',
            static::JULY => 'jun',
            static::AUGUST => 'jul',
            static::SEPTEMBER => 'ago',
            static::OCTOBER => 'set',
            static::NOVEMBER => 'out',
            static::DECEMBER => 'nov',
        };
    }

    public static function getAll(): array
    {
        return [
            'jan' => 1,
            'fev' => 2, 
            'mar' => 3, 
            'abr' => 4, 
            'mai' => 5, 
            'jun' => 6, 
            'jul' => 7, 
            'ago' => 8, 
            'set' => 9, 
            'out' => 10, 
            'nov' => 11, 
            'dez' => 12,
        ];
    }
}
