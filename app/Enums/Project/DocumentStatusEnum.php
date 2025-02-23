<?php

namespace App\Enums\Project;

enum DocumentStatusEnum: int
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
            static::PENDING => 'Enviar',
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

    private function pendingAction(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#050505" viewBox="0 0 256 256">
                <path d="M240,136v64a16,16,0,0,1-16,16H32a16,16,0,0,1-16-16V136a16,16,0,0,1,16-16H80a8,8,0,0,1,0,16H32v64H224V136H176a8,8,0,0,1,0-16h48A16,16,0,0,1,240,136ZM85.66,77.66,120,43.31V128a8,8,0,0,0,16,0V43.31l34.34,34.35a8,8,0,0,0,11.32-11.32l-48-48a8,8,0,0,0-11.32,0l-48,48A8,8,0,0,0,85.66,77.66ZM200,168a12,12,0,1,0-12,12A12,12,0,0,0,200,168Z"></path>
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
