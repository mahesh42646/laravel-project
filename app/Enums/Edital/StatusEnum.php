<?php

namespace App\Enums\Edital;

enum StatusEnum: int
{
    case ACTIVE = 1;
    case PENDING = 2;
    case INACTIVE = 3;
    case FINISHED = 4;

    public function getName(): string
    {
        return match($this) {
            static::ACTIVE => 'Ativo',
            static::PENDING => 'Pendente',
            static::INACTIVE => 'Inativo',
            static::FINISHED => 'Encerrado',
        };
    }

    public function getBackgroundColor(): string
    {
        return match($this) {
            static::ACTIVE => 'color: #30a068; border: 1px solid #30a068; background-color: #CAFED5; border-radius: 5px; padding: 3px 15px;',
            static::PENDING => 'color: #975a04; border: 1px solid #975a04; background-color: #F7E7C8; border-radius: 5px; padding: 3px 15px;',
            static::INACTIVE => 'color: #fc1852; border: 1px solid #fc1852; background-color: #FFE2E5; border-radius: 5px; padding: 3px 15px;',
            static::FINISHED => 'color: #404040; border: 1px solid #404040; background-color: #f4f4f4; border-radius: 5px; padding: 3px 15px;',
        };
    }

    public function getSpan(): string
    {
        return match($this) {
            static::ACTIVE => "<span class='text-dark font-weight-medium' style='border: 1px solid #CCC; border-radius: 8px; padding: 3px 10px 3px 6px;'>{$this->getCheckIcon()} <span>Ativo</span></span>",
            static::PENDING => "<span class='text-dark font-weight-medium' style='border: 1px solid #CCC; border-radius: 8px; padding: 3px 10px 3px 6px;'>{$this->getScheduleIcon()} <span>Pendente</span></span>",
            static::INACTIVE => "<span class='text-dark font-weight-medium' style='border: 1px solid #CCC; border-radius: 8px; padding: 3px 10px 3px 6px;'>{$this->getScheduleIcon()} <span>Inativo</span></span>",
            static::FINISHED => "<span class='text-dark font-weight-medium' style='border: 1px solid #CCC; border-radius: 8px; padding: 3px 10px 3px 6px;'>{$this->getClosedIcon()} <span>Encerrado</span></span>",
        };
    }

    private function getCheckIcon(): string
    {
        return <<<HTML
            <svg width="20" height="20" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-1" style="margin-top: -2px;">
                <path d="M50 9.375C41.9652 9.375 34.1107 11.7576 27.43 16.2215C20.7492 20.6855 15.5422 27.0302 12.4674 34.4535C9.3926 41.8767 8.58809 50.0451 10.1556 57.9255C11.7231 65.806 15.5923 73.0447 21.2738 78.7262C26.9553 84.4077 34.194 88.2769 42.0745 89.8444C49.955 91.4119 58.1233 90.6074 65.5465 87.5326C72.9698 84.4578 79.3145 79.2508 83.7785 72.57C88.2424 65.8893 90.625 58.0349 90.625 50C90.6136 39.2291 86.3299 28.9025 78.7137 21.2863C71.0975 13.6701 60.7709 9.38637 50 9.375ZM67.836 42.8359L45.961 64.7109C45.6707 65.0015 45.3261 65.232 44.9467 65.3893C44.5673 65.5465 44.1607 65.6275 43.75 65.6275C43.3393 65.6275 42.9327 65.5465 42.5533 65.3893C42.174 65.232 41.8293 65.0015 41.5391 64.7109L32.1641 55.3359C31.5777 54.7496 31.2483 53.9543 31.2483 53.125C31.2483 52.2957 31.5777 51.5004 32.1641 50.9141C32.7505 50.3277 33.5458 49.9983 34.375 49.9983C35.2043 49.9983 35.9996 50.3277 36.586 50.9141L43.75 58.082L63.4141 38.4141C63.7044 38.1237 64.0491 37.8934 64.4285 37.7363C64.8078 37.5791 65.2144 37.4983 65.625 37.4983C66.0356 37.4983 66.4422 37.5791 66.8216 37.7363C67.2009 37.8934 67.5456 38.1237 67.836 38.4141C68.1263 38.7044 68.3566 39.0491 68.5137 39.4284C68.6709 39.8078 68.7518 40.2144 68.7518 40.625C68.7518 41.0356 68.6709 41.4422 68.5137 41.8216C68.3566 42.2009 68.1263 42.5456 67.836 42.8359Z" fill="#15B79F"/>
            </svg>
        HTML;
    }

    private function getScheduleIcon(): string
    {
        return <<<HTML
            <svg width="20" height="20" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-1" style="margin-top: -2px;">
                <path d="M50 9.375C41.9652 9.375 34.1107 11.7576 27.43 16.2215C20.7492 20.6855 15.5422 27.0302 12.4674 34.4535C9.3926 41.8767 8.58809 50.0451 10.1556 57.9255C11.7231 65.806 15.5923 73.0447 21.2738 78.7262C26.9553 84.4077 34.194 88.2769 42.0745 89.8444C49.955 91.4119 58.1233 90.6074 65.5465 87.5326C72.9698 84.4578 79.3145 79.2508 83.7785 72.57C88.2424 65.8893 90.625 58.0349 90.625 50C90.6136 39.2291 86.3299 28.9025 78.7137 21.2863C71.0975 13.6701 60.7709 9.38637 50 9.375ZM71.875 53.125H50C49.1712 53.125 48.3764 52.7958 47.7903 52.2097C47.2043 51.6237 46.875 50.8288 46.875 50V28.125C46.875 27.2962 47.2043 26.5013 47.7903 25.9153C48.3764 25.3292 49.1712 25 50 25C50.8288 25 51.6237 25.3292 52.2097 25.9153C52.7958 26.5013 53.125 27.2962 53.125 28.125V46.875H71.875C72.7038 46.875 73.4987 47.2042 74.0847 47.7903C74.6708 48.3763 75 49.1712 75 50C75 50.8288 74.6708 51.6237 74.0847 52.2097C73.4987 52.7958 72.7038 53.125 71.875 53.125Z" fill="#DE7101"/>
            </svg>
        HTML;
    }

    private function getClosedIcon(): string
    {
        return <<<HTML
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#e21246" viewBox="0 0 256 256">
                <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path>
                <path d="M165.66,101.66,139.31,128l26.35,26.34a8,8,0,0,1-11.32,11.32L128,139.31l-26.34,26.35a8,8,0,0,1-11.32-11.32L116.69,128,90.34,101.66a8,8,0,0,1,11.32-11.32L128,116.69l26.34-26.35a8,8,0,0,1,11.32,11.32ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
            </svg>
        HTML;
    }
}
