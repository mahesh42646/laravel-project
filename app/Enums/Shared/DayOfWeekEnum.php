<?php

namespace App\Enums\Shared;

enum DayOfWeekEnum: int
{
    case MONDAY = 1;
    case TUESDAY = 2;
    case WEDNESDAY = 3;
    case THURSDAY = 4;
    case FRIDAY = 5;
    case SATURDAY = 6;
    case SUNDAY = 7;

    public function getName(): string
    {
        return match($this) {
            static::MONDAY => 'Segunda',
            static::TUESDAY => 'Terça',
            static::WEDNESDAY => 'Quarta',
            static::THURSDAY => 'Quinta',
            static::FRIDAY => 'Sexta',
            static::SATURDAY => 'Sábado',
            static::SUNDAY => 'Domingo',
        };
    }

    public function getShortName(): string
    {
        return match($this) {
            static::MONDAY => 'seg',
            static::TUESDAY => 'ter',
            static::WEDNESDAY => 'qua',
            static::THURSDAY => 'qui',
            static::FRIDAY => 'sex',
            static::SATURDAY => 'sab',
            static::SUNDAY => 'dom',
        };
    }

    public function getDefaultName(): string
    {
        return match($this) {
            static::MONDAY => 'monday',
            static::TUESDAY => 'tuesday',
            static::WEDNESDAY => 'wednesday',
            static::THURSDAY => 'thursday',
            static::FRIDAY => 'friday',
            static::SATURDAY => 'saturday',
            static::SUNDAY => 'sunday',
        };
    }

    public function getFullName(): string
    {
        return match($this) {
            static::MONDAY => 'Segunda-Feira',
            static::TUESDAY => 'Terça-Feira',
            static::WEDNESDAY => 'Quarta-Feira',
            static::THURSDAY => 'Quinta-Feira',
            static::FRIDAY => 'Sexta-Feira',
            static::SATURDAY => 'Sábado',
            static::SUNDAY => 'Domingo',
        };
    }
}
