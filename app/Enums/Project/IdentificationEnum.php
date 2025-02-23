<?php

namespace App\Enums\Project;

enum IdentificationEnum: int
{
    case PENDING = 0;
    case APPROVED = 1;
    case REPPROVED = 2;
    case SENT = 3;
    case REVIEW = 4;

    public function getName(): string
    {
        return match($this) {
            static::PENDING => 'Pendente',
            static::APPROVED => 'Aprovado',
            static::REPPROVED => 'Reprovado',
            static::SENT => 'Enviado',
            static::REVIEW => 'Revisar',
        };
    }

    public function getNameAction(): string
    {
        return match($this) {
            static::PENDING => 'Responder',
            static::APPROVED => 'Visualizar',
            static::REPPROVED => 'Visualizar',
            static::SENT => 'Editar',
            static::REVIEW => 'Editar',
        };
    }

    public function getIcon(): string
    {
        return match($this) {
            static::PENDING => $this->pending(),
            static::APPROVED => $this->approved(),
            static::REPPROVED => $this->repproved(),
            static::SENT => $this->sent(),
            static::REVIEW => $this->review(),
        };
    }

    public function getIconAction(): string
    {
        return match($this) {
            static::PENDING => $this->pendingAction(),
            static::APPROVED => $this->approved(),
            static::REPPROVED => $this->repproved(),
            static::SENT => $this->editAction(),
            static::REVIEW => $this->editAction(),
        };
    }

    private function pendingAction(): string
    {
        return <<<HTML
            <svg width="24" height="24" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M88.793 28.6592L71.3399 11.2022C70.7595 10.6217 70.0704 10.1612 69.312 9.84698C68.5537 9.5328 67.7408 9.37109 66.9199 9.37109C66.0991 9.37109 65.2862 9.5328 64.5278 9.84698C63.7695 10.1612 63.0804 10.6217 62.5 11.2022L14.3321 59.3741C13.7492 59.9523 13.287 60.6407 12.9725 61.3991C12.658 62.1576 12.4974 62.971 12.5 63.792V81.2491C12.5 82.9067 13.1585 84.4964 14.3306 85.6685C15.5027 86.8406 17.0924 87.4991 18.75 87.4991H36.2071C37.0281 87.5017 37.8415 87.3411 38.6 87.0266C39.3584 86.7121 40.0468 86.2499 40.625 85.667L88.793 37.4991C89.3735 36.9187 89.834 36.2296 90.1482 35.4712C90.4624 34.7129 90.6241 33.9 90.6241 33.0791C90.6241 32.2583 90.4624 31.4454 90.1482 30.687C89.834 29.9287 89.3735 29.2396 88.793 28.6592ZM36.2071 81.2491H18.75V63.792L53.125 29.417L70.5821 46.8741L36.2071 81.2491ZM75 42.4522L57.543 24.9991L66.918 15.6241L84.375 33.0772L75 42.4522Z" fill="#667085"></path>
            </svg>
        HTML;
    }

    private function editAction(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#495057" viewBox="0 0 256 256">
                <path d="M221.66,90.34,192,120,136,64l29.66-29.66a8,8,0,0,1,11.31,0L221.66,79A8,8,0,0,1,221.66,90.34Z" opacity="0.2"></path>
                <path d="M227.32,73.37,182.63,28.69a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H216a8,8,0,0,0,0-16H115.32l112-112A16,16,0,0,0,227.32,73.37ZM48,163.31l88-88L180.69,120l-88,88H48Zm144-54.62L147.32,64l24-24L216,84.69Z"></path>
            </svg>
        HTML;
    }

    private function pending(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ff9d0a" viewBox="0 0 256 256">
                <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
            </svg>
        HTML;
    }

    private function approved(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#00a66d" viewBox="0 0 256 256">
                <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
            </svg>
        HTML;
    }

    private function repproved(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#f21d56" viewBox="0 0 256 256">
                <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M165.66,101.66,139.31,128l26.35,26.34a8,8,0,0,1-11.32,11.32L128,139.31l-26.34,26.35a8,8,0,0,1-11.32-11.32L116.69,128,90.34,101.66a8,8,0,0,1,11.32-11.32L128,116.69l26.34-26.35a8,8,0,0,1,11.32,11.32ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
            </svg>
        HTML;
    }

    private function sent(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#68737d" viewBox="0 0 256 256">
                <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
            </svg>
        HTML;
    }

    private function review(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#0055ff" viewBox="0 0 256 256">
                <path d="M240,56v48a8,8,0,0,1-8,8H184a8,8,0,0,1,0-16H211.4L184.81,71.64l-.25-.24a80,80,0,1,0-1.67,114.78,8,8,0,0,1,11,11.63A95.44,95.44,0,0,1,128,224h-1.32A96,96,0,1,1,195.75,60L224,85.8V56a8,8,0,1,1,16,0Z"></path>
            </svg>
        HTML;
    }
}
