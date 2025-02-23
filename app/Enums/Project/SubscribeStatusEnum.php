<?php

namespace App\Enums\Project;

enum SubscribeStatusEnum: int
{
    case PENDING = 0;
    case APPROVED = 1;

    public function getName(): string
    {
        return match($this) {
            static::PENDING => 'Rascunho',
            static::APPROVED => 'Realizada',
        };
    }

    public function getIcon(): string
    {
        return match($this) {
            static::PENDING => $this->info(),
            static::APPROVED => $this->check(),
        };
    }

    private function info(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#74788d" viewBox="0 0 256 256">
                <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm56,112H128a8,8,0,0,1-8-8V72a8,8,0,0,1,16,0v48h48a8,8,0,0,1,0,16Z"></path>
            </svg>
        HTML;
    }

    private function check(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#34c38f" viewBox="0 0 256 256">
                <path d="M237.66,85.26l-128.4,128.4a8,8,0,0,1-11.32,0l-71.6-72a8,8,0,0,1,0-11.31l24-24a8,8,0,0,1,11.32,0L104,147.43l98.34-97.09a8,8,0,0,1,11.32,0l24,23.6A8,8,0,0,1,237.66,85.26Z" opacity="0.2"></path><path d="M243.28,68.24l-24-23.56a16,16,0,0,0-22.59,0L104,136.23l-36.69-35.6a16,16,0,0,0-22.58.05l-24,24a16,16,0,0,0,0,22.61l71.62,72a16,16,0,0,0,22.63,0L243.33,90.91A16,16,0,0,0,243.28,68.24ZM103.62,208,32,136l24-24a.6.6,0,0,1,.08.08l42.35,41.09a8,8,0,0,0,11.19,0L208.06,56,232,79.6Z"></path>
            </svg>
        HTML;
    }
}
