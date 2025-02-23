<?php

namespace App\Enums\SuperAdmin;

enum PostStatusEnum: int
{
    case DRAFT = 0;
    case PUBLISHED = 1;

    public function getName(): string
    {
        return match($this) {
            static::DRAFT => 'Rascunho',
            static::PUBLISHED => 'Publicar',
        };
    }

    public function getLabel(): string
    {
        return match($this) {
            static::DRAFT => 'Rascunho',
            static::PUBLISHED => 'Publicado',
        };
    }

    public function getStyle(): string
    {
        return match($this) {
            static::DRAFT => 'color: #015E22; background-color: #C4F2E4;',
            static::PUBLISHED => 'color: #fc1852; background-color: #FFE2E5;',
        };
    }
}
