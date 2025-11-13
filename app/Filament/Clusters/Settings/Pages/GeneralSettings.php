<?php

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings\SettingsCluster;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class GeneralSettings extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static ?string $cluster = SettingsCluster::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->schema([
                        FileUpload::make('logo')
                            ->image()
                            ->disk('public'),

                        TextInput::make('logo_height')
                            ->required(),

                        TextInput::make('copyright')
                            ->required()
                    ])
            ]);
    }
    public static function getNavigationLabel(): string
    {
        return __('General Settings');
    }

    public function getTitle(): string
    {
        return __('General Settings');
    }

}
