<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public ?string $logo = null;
    public ?string $logo_height = null;
    public ?string $copyright = null;

    public static function group(): string
    {
        return 'general_settings';
    }
}