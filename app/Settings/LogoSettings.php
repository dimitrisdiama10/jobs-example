<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class LogoSettings extends Settings
{
    public ?string $logo = null;
    public ?string $logo_height = null;
    public static function group(): string
    {
        return 'logo_settings';
    }
}