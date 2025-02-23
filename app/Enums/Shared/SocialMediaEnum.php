<?php

namespace App\Enums\Shared;

enum SocialMediaEnum: int
{
    case INSTAGRAM = 1;
    case FACEBOOK = 2;
    case YOUTUBE = 3;
    case LINKEDIN = 4;
    case WEBSITE = 5;
    case TIKTOK = 6;
    case TWITTER = 7;
    case OTHER = 99;

    public function getName(): string
    {
        return match($this) {
            static::INSTAGRAM => 'Instagram',
            static::FACEBOOK => 'Facebook',
            static::YOUTUBE => 'Youtube',
            static::LINKEDIN => 'Linkedin',
            static::WEBSITE => 'WebSite',
            static::TIKTOK => 'TikTok',
            static::TWITTER => 'Twitter',
            static::OTHER => 'Outra',
        };
    }

    public function getIcon(): string
    {
        return match($this) {
            static::INSTAGRAM => asset('images/social-medias/instagram.svg'),
            static::FACEBOOK => asset('images/social-medias/facebook.svg'),
            static::YOUTUBE => asset('images/social-medias/youtube.svg'),
            static::LINKEDIN => asset('images/social-medias/linkedin.svg'),
            static::WEBSITE => asset('images/social-medias/site.svg'),
            static::TIKTOK => asset('images/social-medias/tiktok.svg'),
            static::TWITTER => asset('images/social-medias/twitter.svg'),
            static::OTHER => asset('images/social-medias/other.svg'),
        };
    }
}
