<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general_settings.logo');
        $this->migrator->add('general_settings.logo_height', '3.3rem');
        $this->migrator->add('general_settings.copyright', '© Copyright');
    }
};
