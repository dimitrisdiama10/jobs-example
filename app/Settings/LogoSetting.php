<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class LogoSetting extends Settings
{

    public static function group(): string
    {
        return 'logo_settings';
    }
}