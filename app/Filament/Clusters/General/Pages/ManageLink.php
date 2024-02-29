<?php

namespace App\Filament\Clusters\General\Pages;

use App\Filament\Clusters\General;
use App\Settings\GeneralSettings;
use Filament\Forms;
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
                    ->columns(2)
                    ->schema([
                        TextInput::make('facebook_link')
                            ->suffixIcon('heroicon-c-link')
                            ->label('Facebook'),
                        TextInput::make('instagram_link')
                            ->suffixIcon('heroicon-c-link')
                            ->label('Instagram'),
                        TextInput::make('x_link')
                            ->suffixIcon('heroicon-c-link')
                            ->label('X (Twitter)'),
                        TextInput::make('tiktok_link')
                            ->suffixIcon('heroicon-c-link')
                            ->label('Tiktok'),
                        TextInput::make('youtube_link')
                            ->suffixIcon('heroicon-c-link')
                            ->label('YouTube')
                    ]),

                // Contact
                Section::make('Contact')
                    ->collapsible()
                    ->columns(2)
                    ->schema([
                        TextInput::make('line_link')
                            ->suffixIcon('heroicon-m-user-plus')
                            ->label('Line'),
                        TextInput::make('phone_link')
                            ->suffixIcon('heroicon-m-user-plus')
                            ->label('Email'),
                        TextInput::make('email_link')
                            ->suffixIcon('heroicon-m-user-plus')
                            ->label('Email'),
                        TextInput::make('whatsapp_link')
                            ->suffixIcon('heroicon-m-user-plus')
                            ->label('WhatsApp'),
                    ]),
            ]);
    }
}
