<?php

namespace App\Enums\Shared;

enum RoleEnum: int
{
    case MAIN = 99;
    case SUPER_ADMIN = 1;
    case ADMIN = 2;
    case PROFESSIONAL = 3;

    public function getName(): string
    {
        return match($this) {
            static::MAIN => 'Usuário Principal',
            static::SUPER_ADMIN => 'Super Administrador',
            static::ADMIN => 'Administrador',
            static::PROFESSIONAL => 'Profissional',
        };
    }

    public function getShortName(): string
    {
        return match($this) {
            static::MAIN => 'Usuário Principal',
            static::SUPER_ADMIN => 'Super Admin',
            static::ADMIN => 'Admin',
            static::PROFESSIONAL => 'Professional',
        };
    }

    public function getLabel(): string
    {
        return match($this) {
            static::MAIN => 'main',
            static::SUPER_ADMIN => 'super_admin',
            static::ADMIN => 'admin',
            static::PROFESSIONAL => 'professional',
        };
    }
}
