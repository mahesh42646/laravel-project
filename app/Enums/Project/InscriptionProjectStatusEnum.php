<?php

namespace App\Enums\Project;

enum InscriptionProjectStatusEnum: int
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

    public function getIcon(): string
    {
        return match($this) {
            static::PENDING => $this->info(),
            static::APPROVED => $this->check(),
            static::REPPROVED => $this->cancel(),
            static::REANALYZE => $this->reanalyze(),
        };
    }

    private function info(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#f1bb44" viewBox="0 0 256 256">
                <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
            </svg>
        HTML;
    }

    private function check(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#34c38f" viewBox="0 0 256 256">
                <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
            </svg>
        HTML;
    }

    private function cancel(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#f21d56" viewBox="0 0 256 256">
                <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M165.66,101.66,139.31,128l26.35,26.34a8,8,0,0,1-11.32,11.32L128,139.31l-26.34,26.35a8,8,0,0,1-11.32-11.32L116.69,128,90.34,101.66a8,8,0,0,1,11.32-11.32L128,116.69l26.34-26.35a8,8,0,0,1,11.32,11.32ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
            </svg>
        HTML;
    }

    private function reanalyze(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#0263ff" viewBox="0 0 256 256">
                <path d="M240,56v48a8,8,0,0,1-8,8H184a8,8,0,0,1,0-16H211.4L184.81,71.64l-.25-.24a80,80,0,1,0-1.67,114.78,8,8,0,0,1,11,11.63A95.44,95.44,0,0,1,128,224h-1.32A96,96,0,1,1,195.75,60L224,85.8V56a8,8,0,1,1,16,0Z"></path>
            </svg>
        HTML;
    }
}
