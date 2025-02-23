<?php

namespace App\Enums\Customer;

enum MainAreaAtuationEnum: int
{
    case ARTES_VISUAIS = 1;
    case ARTES_CENICAS = 2;
    case MUSICA = 3;
    case LITERATURA = 4;
    case OUTRO = 99;

    public function getName(): string
    {
        return match($this) {
            static::ARTES_VISUAIS => 'Artes Visuais (artes plásticas, artesanato, fotografia, design, arte urbana, arte digital ou outras linguagens)',
            static::ARTES_CENICAS => 'Artes cênicas (Teatro, Dança, Circo)',
            static::MUSICA => 'Música',
            static::LITERATURA => 'Literatura',
            static::OUTRO => 'Outro(a)',
        };
    }

    public static function toArray(): array
    {
        return array_map(fn ($mainArea) => [
            'id' => $mainArea->value,
            'name' => $mainArea->getName(),
        ], static::cases());
    }
}
