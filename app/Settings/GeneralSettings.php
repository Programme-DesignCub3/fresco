<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
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

    /**
     * Marketplace
     */
    public string $tokopedia_store;
    public string $shopee_store;
    public string $lazada_store;
    public string $kapalapi_store;

    /**
     * Social Media Link
     */
    public string $facebook_link;
    public string $instagram_link;
    public string $x_link;
    public string $tiktok_link;
    public string $youtube_link;
    public string $email_link;
    public string $phone_link;
    public string $whatsapp_link;
    public string $line_link;

    public static function group(): string
    {
        return 'General';
    }
}
