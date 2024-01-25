<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HomeSettings extends Settings
{
    /**
     * Introduction Section
     */
    public string $black_intro_title;
    public string $black_intro_desc;
    public string $black_intro_image;
    public string $cappuccino_intro_title;
    public string $cappuccino_intro_desc;
    public string $cappuccino_intro_image;

    /**
     * Video & Collaboration Section
     */
    public string $black_video_url;
    public string $black_video_collab;
    public string $black_video_desc;
    public string $cappuccino_video_url;
    public string $cappuccino_video_collab;
    public string $cappuccino_video_desc;

    /**
     * Description Section
     */
    public array $black_desc_list;
    public array $cappuccino_desc_list;

    public static function group(): string
    {
        return 'Home';
    }
}
