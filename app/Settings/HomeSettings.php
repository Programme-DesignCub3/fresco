<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HomeSettings extends Settings
{

    public static function group(): string
    {
        return 'Home';
    }
}