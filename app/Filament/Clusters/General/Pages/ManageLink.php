<?php

namespace App\Filament\Clusters\General\Pages;

use App\Filament\Clusters\General;
use App\Settings\GeneralSettings;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageLink extends SettingsPage
{
    protected ?string $heading = 'Contact';

    protected ?string $subheading = 'Controls all link & contact';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationGroup = 'Link';

    protected static ?string $navigationLabel = 'Contact';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = GeneralSettings::class;

    protected static ?string $cluster = General::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Link
                Section::make('Link')
                    ->collapsible()
                    ->schema([
                        Fieldset::make('Facebook')
                            ->schema([
                                TextInput::make('facebook_alias')
                                    ->label('Alias'),
                                TextInput::make('facebook_link')
                                    ->suffixIcon('heroicon-c-link')
                                    ->label('Link'),
                            ]),
                        Fieldset::make('Instagram')
                            ->schema([
                                TextInput::make('instagram_alias')
                                    ->label('Alias'),
                                TextInput::make('instagram_link')
                                    ->suffixIcon('heroicon-c-link')
                                    ->label('Link'),
                            ]),
                        Fieldset::make('X (Twitter)')
                            ->schema([
                                TextInput::make('x_alias')
                                    ->label('Alias'),
                                TextInput::make('x_link')
                                    ->suffixIcon('heroicon-c-link')
                                    ->label('Link'),
                            ]),
                        Fieldset::make('Tiktok')
                            ->schema([
                                TextInput::make('tiktok_alias')
                                    ->label('Alias'),
                                TextInput::make('tiktok_link')
                                    ->suffixIcon('heroicon-c-link')
                                    ->label('Link'),
                            ]),
                        Fieldset::make('YouTube')
                            ->schema([
                                TextInput::make('youtube_alias')
                                    ->label('Alias'),
                                TextInput::make('youtube_link')
                                    ->suffixIcon('heroicon-c-link')
                                    ->label('Link'),
                            ])
                    ]),

                // Contact
                Section::make('Contact')
                    ->collapsible()
                    ->schema([
                        Fieldset::make('Line')
                            ->schema([
                                TextInput::make('line_alias')
                                    ->label('Alias'),
                                TextInput::make('line_link')
                                    ->suffixIcon('heroicon-m-user-plus')
                                    ->label('Link'),
                            ]),
                        Fieldset::make('Email')
                            ->schema([
                                TextInput::make('email_alias')
                                    ->label('Alias'),
                                TextInput::make('email_link')
                                    ->suffixIcon('heroicon-m-user-plus')
                                    ->label('Link'),
                            ]),
                        Fieldset::make('Phone')
                            ->schema([
                                TextInput::make('phone_alias')
                                    ->label('Alias'),
                                TextInput::make('phone_link')
                                    ->suffixIcon('heroicon-m-user-plus')
                                    ->label('Link'),
                            ]),
                        Fieldset::make('WhatsApp')
                            ->schema([
                                TextInput::make('whatsapp_alias')
                                    ->label('Alias'),
                                TextInput::make('whatsapp_link')
                                    ->suffixIcon('heroicon-m-user-plus')
                                    ->label('Link'),
                            ]),
                    ]),
            ]);
    }
}
