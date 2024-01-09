<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageGeneral extends SettingsPage
{
    protected static ?string $navigationGroup = 'Settings & Gallery';

    protected static ?string $navigationLabel = 'General';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = GeneralSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                /**
                 * <START> Social Media Link
                 */
                Section::make('Social Media Link')
                    ->description('Managing link of social media')
                    ->icon('heroicon-m-user-group')
                    ->columns(2)
                    ->schema([
                        Fieldset::make(null)
                            ->columns(3)
                            ->schema([
                                TextInput::make('facebook_link')
                                    ->label('Facebook'),
                                TextInput::make('instagram_link')
                                    ->label('Instagram'),
                                TextInput::make('x_link')
                                    ->label('X (Twitter)'),
                                TextInput::make('tiktok_link')
                                    ->label('Tiktok'),
                                TextInput::make('youtube_link')
                                    ->label('YouTube'),
                                TextInput::make('whatsapp_link')
                                    ->label('WhatsApp'),
                            ]),
                    ])
                /**
                 * <END> Social Media Link
                 */
            ]);
    }
}
