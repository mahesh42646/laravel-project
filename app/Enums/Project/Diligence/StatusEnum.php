<?php

namespace App\Enums\Project\Diligence;

enum StatusEnum: int
{
    case PENDING = 0;
    case APPROVED = 1;
    case REPPROVED = 2;
    case REANALYZE = 3;

    public function getName(): string
    {
        return match($this) {
            static::PENDING => 'Pendente',
            static::APPROVED => 'Aprovado',
            static::REPPROVED => 'Reprovado',
            static::REANALYZE => 'Em Reanálise',
        };
    }

    public function getBackgroundColor(): string
    {
        return match($this) {
            static::PENDING => 'color: #975a04; border: 1px solid #975a04; background-color: #F7E7C8; border-radius: 5px; padding: 3px 15px;',
            static::APPROVED => 'color: #30a068; border: 1px solid #30a068; background-color: #CAFED5; border-radius: 5px; padding: 3px 15px;',
            static::REPPROVED => 'color: #fc1852; border: 1px solid #fc1852; background-color: #FFE2E5; border-radius: 5px; padding: 3px 15px;',
            static::REANALYZE => 'color: #404040; border: 1px solid #404040; background-color: #f4f4f4; border-radius: 5px; padding: 3px 15px;',
        };
    }

    public function getIcon(): string
    {
        return match($this) {
            static::PENDING => $this->info(),
            static::APPROVED => $this->check(),
            static::REPPROVED => $this->cancel(),
            static::REANALYZE => $this->infoReanalyze(),
        };
    }

    private function check(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30" fill="#34c38f">
                <path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
            </svg>
        HTML;
    }

    private function info(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30" fill="#ffae1f">
                <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
            </svg>
        HTML;
    }

    private function infoReanalyze(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30" fill="#01a2e9">
                <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
            </svg>
        HTML;
    }

    private function cancel(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30" fill="#ff002e">
                <path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
            </svg>
        HTML;
    }

    public function getStylePublic(): string
    {
        return match($this) {
            static::PENDING => 'color: #FFF; background-color: #FFAE1F;',
            static::APPROVED => 'color: #015E22; background-color: #C4F2E4;',
            static::REPPROVED => 'color: #fc1852; background-color: #FFE2E5;',
            static::REANALYZE => 'color: #1A79F2; background-color: #90E6FB;',
        };
    }

    public function getIconPublic(): string
    {
        return match($this) {
            static::PENDING => $this->infoPublic(),
            static::APPROVED => $this->checkPublic(),
            static::REPPROVED => $this->cancelPublic(),
            static::REANALYZE => $this->warnPublic(),
        };
    }

    

    private function checkPublic(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" class="ml-2" fill="#015E22">
                <path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
            </svg>
        HTML;
    }

    private function infoPublic(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" class="ml-2" fill="#FFF">
                <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
            </svg>
        HTML;
    }

    private function warnPublic(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" class="ml-2" fill="#1A79F2">
                <path d="M440-280h80v-240h-80v240Zm40-320q17 0 28.5-11.5T520-640q0-17-11.5-28.5T480-680q-17 0-28.5 11.5T440-640q0 17 11.5 28.5T480-600Zm0 520q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
            </svg>
        HTML;
    }

    private function cancelPublic(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" class="ml-2" fill="#ff002e">
                <path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
            </svg>
        HTML;
    }
}
