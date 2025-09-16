<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    // Description Section
    public array $black_desc_list;
    public array $cappuccino_desc_list;

    // Marketplace Link
    public array $marketplaces;

    // Email Recipient
    public array $email_recipient;

    // Social Media Link
    public string $facebook_alias;
    public string $facebook_link;

    public string $instagram_alias;
    public string $instagram_link;

    public string $x_alias;
    public string $x_link;

    public string $tiktok_alias;
    public string $tiktok_link;

    public string $youtube_alias;
    public string $youtube_link;

    public string $email_alias;
    public string $email_link;

    public string $phone_alias;
    public string $phone_link;

    public string $whatsapp_alias;
    public string $whatsapp_link;

    public string $line_alias;
    public string $line_link;

    public static function group(): string
    {
        return 'General';
    }
}
