<?php

namespace App\Helpers;

final class Sanitize
{
    public static function number($value)
    {
        return preg_replace('/[^\d]/', '', $value);
    }
}
