<?php

namespace App\Traits;

trait EnumTrait
{
    public static function getValues(): array
    {
        return collect(self::cases())
            ->pluck('value')
            ->toArray();
    }
}
