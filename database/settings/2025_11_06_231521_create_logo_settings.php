<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('logo_settings.logo');
        $this->migrator->add('logo_settings.logo_height', '3.3rem');
    }
};
