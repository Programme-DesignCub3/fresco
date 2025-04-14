<?php

namespace App\Filament\Clusters\General\Pages;

use App\Filament\Clusters\General;
use App\Settings\GeneralSettings;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageLink extends SettingsPage
{
    protected ?string $heading = 'Contact';

    protected ?string $subheading = 'Manage all link & contact';

    protected static ?int $navigationSort = 3;

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
                    ->description('Minimize for comfortable viewing')
                    ->icon('heroicon-c-link')
                    ->collapsible()
                    ->schema([
                        Fieldset::make('Facebook')
                            ->columns(2)
                            ->schema([
                                TextInput::make('facebook_alias')
                                    ->label('Alias'),
                                TextInput::make('facebook_link')
                                    ->prefixIcon('heroicon-c-link')
                                    ->label('Link'),
                            ]),
                        Fieldset::make('Instagram')
                            ->columns(2)
                            ->schema([
                                TextInput::make('instagram_alias')
                                    ->label('Alias'),
                                TextInput::make('instagram_link')
                                    ->prefixIcon('heroicon-c-link')
                                    ->label('Link'),
                            ]),
                        Fieldset::make('X (Twitter)')
                            ->columns(2)
                            ->schema([
                                TextInput::make('x_alias')
                                    ->label('Alias'),
                                TextInput::make('x_link')
                                    ->prefixIcon('heroicon-c-link')
                                    ->label('Link'),
                            ]),
                        Fieldset::make('Tiktok')
                            ->columns(2)
                            ->schema([
                                TextInput::make('tiktok_alias')
                                    ->label('Alias'),
                                TextInput::make('tiktok_link')
                                    ->prefixIcon('heroicon-c-link')
                                    ->label('Link'),
                            ]),
                        Fieldset::make('YouTube')
                            ->columns(2)
                            ->schema([
                                TextInput::make('youtube_alias')
                                    ->label('Alias'),
                                TextInput::make('youtube_link')
                                    ->prefixIcon('heroicon-c-link')
                                    ->label('Link'),
                            ])
                    ]),
                // Contact
                Section::make('Contact')
                    ->description('Minimize for comfortable viewing')
                    ->icon('heroicon-m-user-plus')
                    ->collapsible()
                    ->schema([
                        Fieldset::make('Line')
                            ->columns(2)
                            ->schema([
                                TextInput::make('line_alias')
                                    ->label('Alias'),
                                TextInput::make('line_link')
                                    ->prefixIcon('heroicon-m-user-plus')
                                    ->label('Link'),
                            ]),
                        Fieldset::make('Email')
                            ->columns(2)
                            ->schema([
                                TextInput::make('email_alias')
                                    ->label('Alias'),
                                TextInput::make('email_link')
                                    ->prefixIcon('heroicon-m-user-plus')
                                    ->label('Link'),
                            ]),
                        Fieldset::make('Phone')
                            ->columns(2)
                            ->schema([
                                TextInput::make('phone_alias')
                                    ->label('Alias'),
                                TextInput::make('phone_link')
                                    ->prefixIcon('heroicon-m-user-plus')
                                    ->label('Link'),
                            ]),
                        Fieldset::make('WhatsApp')
                            ->columns(2)
                            ->schema([
                                TextInput::make('whatsapp_alias')
                                    ->label('Alias'),
                                TextInput::make('whatsapp_link')
                                    ->prefixIcon('heroicon-m-user-plus')
                                    ->label('Link'),
                            ]),
                    ])
            ]);
    }
}
