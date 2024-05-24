<?php

namespace App\Settings;

use Nl2brCast;
use Spatie\LaravelSettings\Settings;

class PageSettings extends Settings
{
    /**
     * Page Home
     */
    // Introduction Section
    public string $black_intro_title;
    public string $black_intro_layout;
    public string $black_intro_desc;
    public string $black_intro_image_id;
    public string $black_intro_image;

    public string $cappuccino_intro_title;
    public string $cappuccino_intro_layout;
    public string $cappuccino_intro_desc;
    public string $cappuccino_intro_image_id;
    public string $cappuccino_intro_image;

    // Video & Collaboration Section
    public string $black_video_url;
    public array $black_video_collab;
    public string $black_video_desc;

    public string $cappuccino_video_url;
    public array $cappuccino_video_collab;
    public string $cappuccino_video_desc;

    /**
     * Page Product
     */
    // Heading Banner
    public string $pd_black_banner_title;
    public string $pd_black_banner_position;
    public string $pd_black_banner_image_id;
    public string $pd_black_banner_image;

    public string $pd_cappuccino_banner_title;
    public string $pd_cappuccino_banner_position;
    public string $pd_cappuccino_banner_image_id;
    public string $pd_cappuccino_banner_image;

    /**
     * Page Article
     */
    // Heading Banner
    public string $ar_black_banner_title;
    public string $ar_black_banner_position;
    public string $ar_black_banner_image_id;
    public string $ar_black_banner_image;

    public string $ar_cappuccino_banner_title;
    public string $ar_cappuccino_banner_position;
    public string $ar_cappuccino_banner_image_id;
    public string $ar_cappuccino_banner_image;

    /**
     * Page Activity
     */
    // Heading Banner
    public string $ac_black_banner_title;
    public string $ac_black_banner_position;
    public string $ac_black_banner_image_id;
    public string $ac_black_banner_image;

    public string $ac_cappuccino_banner_title;
    public string $ac_cappuccino_banner_position;
    public string $ac_cappuccino_banner_image_id;
    public string $ac_cappuccino_banner_image;

    /**
     * Page Contact
     */
    // Heading Banner
    public string $cn_black_banner_title;
    public string $cn_black_banner_position;
    public string $cn_black_banner_image_id;
    public string $cn_black_banner_image;

    public string $cn_cappuccino_banner_title;
    public string $cn_cappuccino_banner_position;
    public string $cn_cappuccino_banner_image_id;
    public string $cn_cappuccino_banner_image;

    public static function group(): string
    {
        return 'pages';
    }
}
