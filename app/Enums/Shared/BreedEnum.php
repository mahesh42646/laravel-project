<?php

namespace App\Enums\Shared;

enum BreedEnum: int
{
    case WHITE = 1;
    case BLACK = 2;
    case YELLOW = 3;
    case BROWN = 4;
    case INDIGINE = 5;
    case NOT_DECLARATION = 6;

    public function getName(): string
    {
        return match($this) {
            static::WHITE => 'Branca',
            static::BLACK => 'Preta',
            static::YELLOW => 'Amarela',
            static::BROWN => 'Parda',
            static::INDIGINE => 'Indígena',
            static::NOT_DECLARATION => 'Não declarado',
        };
    }

    public static function toArray(): array
    {
        return array_map(fn ($breed) => [
            'id' => $breed->value,
            'name' => $breed->getName(),
        ], static::cases());
    }
}
