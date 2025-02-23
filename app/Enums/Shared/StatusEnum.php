<?php

namespace App\Enums\Shared;

enum StatusEnum: int
{
    case NOT_PAID = 0;
    case PAID = 1;
    case DELAY = 2;
    case WITHOUT_REGISTER = 3;

    public function getName(): string
    {
        return match($this) {
            static::NOT_PAID => 'Não Pago',
            static::PAID => 'Pago',
            static::DELAY => 'Atrasado',
            static::WITHOUT_REGISTER => 'Sem Matrícula',
        };
    }

    public function getShortName(): string
    {
        return match($this) {
            static::NOT_PAID => 'NP',
            static::PAID => 'P',
            static::DELAY => 'AT',
            static::WITHOUT_REGISTER => 'SM',
        };
    }

    public function getColor(): string
    {
        return match($this) {
            static::NOT_PAID => 'background-color: #FFEDCC; color: #FBAA34; padding-left: 15px; padding-right: 15px; padding-top: 7px; padding-bottom: 7px; border-radius: 6px; font-weight: 500; cursor: pointer;',
            static::PAID => 'background-color: #CAFFD5; color: #41CF87; padding-left: 15px; padding-right: 15px; padding-top: 7px; padding-bottom: 7px; border-radius: 6px; font-weight: 500; cursor: pointer;',
            static::DELAY => 'background-color: #FFD8E1; color: #F04C53; padding-left: 15px; padding-right: 15px; padding-top: 7px; padding-bottom: 7px; border-radius: 6px; font-weight: 500; cursor: pointer;',
            static::WITHOUT_REGISTER => 'background-color: #EFF0F2; color: #3C3C3C; padding-left: 15px; padding-right: 15px; padding-top: 7px; padding-bottom: 7px; border-radius: 6px; font-weight: 500; cursor: help;',
        };
    }

    public function getTextColor(): string
    {
        return match($this) {
            static::NOT_PAID => 'color: #FBAA34; font-weight: 500;',
            static::PAID => 'color: #1cc273; font-weight: 500;',
            static::DELAY => 'color: #F04C53; font-weight: 500;',
            static::WITHOUT_REGISTER => 'color: #3C3C3C; font-weight: 500; cursor: help;',
        };
    }

    public function getSpanColor(): string
    {
        return match($this) {
            static::NOT_PAID => '<span class="btn font-weight-semibold px-4 py-1"style="background-color: #FFEDCD; color: #FBAB32; border: 1px solid #FA9401; border-radius: 10px">Pendente</span>',
            static::PAID => '<span class="btn font-weight-semibold px-4 py-1" style="background-color: #CDF9EA; color: #4DDC68; border: 1px solid #00E097; border-radius: 10px">Quitado</span>',
            static::DELAY => '<span class="btn font-weight-semibold px-4 py-1"style="background-color: #FFE2E6; color: #FF3A6F; border: 1px solid #FF3A6F; border-radius: 10px">Atrasado</span>',
            static::WITHOUT_REGISTER => '<span class="btn font-weight-semibold px-4 py-1" style="background-color: #EFF0F2; color: #3C3C3C; border: 1px solid #3C3C3C; border-radius: 10px">S. Matrícula</span>',
        };
    }
}
