<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        /**
         * Social Media Link
         */
        $this->migrator->add('general.facebook_link');
        $this->migrator->add('general.instagram_link');
        $this->migrator->add('general.x_link');
        $this->migrator->add('general.tiktok_link');
        $this->migrator->add('general.youtube_link');
        $this->migrator->add('general.whatsapp_link');
    }
};
