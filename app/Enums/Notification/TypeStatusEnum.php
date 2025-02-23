<?php

namespace App\Enums\Notification;

enum TypeStatusEnum: int
{
    case APPROVED = 1;
    case REPPROVED = 2;
    case REANALYZE = 3;

    public function getName(): string
    {
        return match($this) {
            static::APPROVED => 'Aprovado',
            static::REPPROVED => 'Reprovado',
            static::REANALYZE => 'Em Reanálise',
        };
    }

    public function getStyle(): string
    {
        return match($this) {
            static::APPROVED => 'color: #015E22; background-color: #C4F2E4;',
            static::REPPROVED => 'color: #fc1852; background-color: #FFE2E5;',
            static::REANALYZE => 'color: #1A79F2; background-color: #cef5ff;',
        };
    }

    public function getIcon(): string
    {
        return match($this) {
            static::APPROVED => $this->checkPublic(),
            static::REPPROVED => $this->cancelPublic(),
            static::REANALYZE => $this->infoPublic(),
        };
    }

    private function checkPublic(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30" class="ml-2" fill="#015E22">
                <path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
            </svg>
        HTML;
    }

    private function cancelPublic(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30" class="ml-2" fill="#ff002e">
                <path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
            </svg>
        HTML;
    }

    private function infoPublic(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30" class="ml-2" fill="#1A79F2">
                <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
            </svg>
        HTML;
    }
}
