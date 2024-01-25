<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    /**
     * Menu Section
     */
    public string $black_menu_bg;
    public string $black_menu_coffee;
    public string $cappuccino_menu_bg;
    public string $cappuccino_menu_coffee;

    /**
     * Social Media Link
     */
    public ?string $facebook_link;
    public ?string $instagram_link;
    public ?string $x_link;
    public ?string $tiktok_link;
    public ?string $youtube_link;
    public ?string $whatsapp_link;

    public static function group(): string
    {
        return 'General';
    }
}
