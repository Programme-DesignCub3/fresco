<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
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
