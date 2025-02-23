<?php

namespace App\Enums\Project\Analyze;

enum TimelineStatusEnum: int
{
    case SENT = 1;
    case UPDATED = 2;
    case APPROVED = 3;
    case REPPROVED = 4;
    case REVIEW = 5;
    case REVISED = 6;
    
    public function getName(): string
    {
        return match($this) {
            static::SENT => 'Enviado',
            static::UPDATED => 'Atualizado',
            static::APPROVED => 'Aprovado',
            static::REPPROVED => 'Reprovado',
            static::REVIEW => 'Revisão solicitada',
            static::REVISED => 'Revisado',
        };
    }

    public function getIcon(): string
    {
        return match($this) {
            static::SENT => $this->sent(),
            static::UPDATED => $this->update(),
            static::APPROVED => $this->check(),
            static::REPPROVED => $this->cancel(),
            static::REVIEW => $this->review(), 
            static::REVISED => $this->revised(), 
        };
    }

    private function sent(): string
    {
        return <<<HTML
            <div style="padding: 8px; border-radius: 50%; background-color: #CCC;">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#000000" viewBox="0 0 256 256">
                    <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                </svg>
            </div>
        HTML;
    }

    private function update(): string
    {
        return <<<HTML
            <div style="padding: 8px; border-radius: 50%; background-color: #ffe0d7;">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#f1734f" viewBox="0 0 256 256">
                    <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path>
                    <path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                </svg>
            </div>
        HTML;
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
            <div style="padding: 8px; border-radius: 50%; background-color: #dff9f0;">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#34c38f" viewBox="0 0 256 256">
                    <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                </svg>
            </div>
        HTML;
    }

    private function cancel(): string
    {
        return <<<HTML
            <div style="padding: 8px; border-radius: 50%; background-color: #fde0e0;">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#f21d56" viewBox="0 0 256 256">
                    <path d="M221.66,90.34,192,120,136,64l29.66-29.66a8,8,0,0,1,11.31,0L221.66,79A8,8,0,0,1,221.66,90.34Z" opacity="0.2"></path><path d="M53.92,34.62A8,8,0,1,0,42.08,45.38l48.2,53L36.68,152A15.89,15.89,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31l50.4-50.39,47.69,52.46a8,8,0,1,0,11.84-10.76Zm63,93.12L68,176.69,51.31,160l49.75-49.74ZM48,179.31,76.69,208H48Zm48,25.38L79.32,188l48.41-48.41,15.89,17.48ZM227.32,73.37,182.63,28.69a16,16,0,0,0-22.63,0L118.33,70.36a8,8,0,0,0,11.32,11.31L136,75.31,152.69,92,145,99.69A8,8,0,1,0,156.31,111l7.69-7.69L180.69,120l-9,9A8,8,0,0,0,183,140.34L227.32,96A16,16,0,0,0,227.32,73.37ZM192,108.69,147.32,64l24-24L216,84.69Z"></path>
                </svg>
            </div>
        HTML;
    }

    private function review(): string
    {
        return <<<HTML
            <div style="padding: 8px; border-radius: 50%; background-color: #d9e7ff;">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#0263ff" viewBox="0 0 256 256">
                    <path d="M240,56v48a8,8,0,0,1-8,8H184a8,8,0,0,1,0-16H211.4L184.81,71.64l-.25-.24a80,80,0,1,0-1.67,114.78,8,8,0,0,1,11,11.63A95.44,95.44,0,0,1,128,224h-1.32A96,96,0,1,1,195.75,60L224,85.8V56a8,8,0,1,1,16,0Z"></path>
                </svg>
            </div>
        HTML;
    }

    private function revised(): string
    {
        return <<<HTML
            <div style="padding: 8px; border-radius: 50%; background-color: #d9e7ff;">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#0263ff" viewBox="0 0 256 256">
                    <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path><path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
                </svg>
            </div>
        HTML;
    }
}
