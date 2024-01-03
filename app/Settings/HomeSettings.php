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
     * Product List Section
     */
    public string $black_product_image;
    public string $black_product_name;
    public string $cappuccino_product_image;
    public string $cappuccino_product_name;

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
    public string $black_desc_image;
    public string $black_desc_title;
    public string $black_desc_explanation;
    public string $cappuccino_desc_image;
    public string $cappuccino_desc_title;
    public string $cappuccino_desc_explanation;

    public static function group(): string
    {
        return 'Home';
    }
}
