<?php

namespace App\Filament\Clusters\General\Pages;

use App\Filament\Clusters\General;
use App\Settings\GeneralSettings;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageResponse extends SettingsPage
{
    protected ?string $heading = 'Email Recipient';

    protected ?string $subheading = 'Manage email recipient from contact form';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationGroup = 'Response';

    protected static ?string $navigationLabel = 'Email Recipient';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = GeneralSettings::class;

    protected static ?string $cluster = General::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Email Recipient')
                    ->description('Minimize for comfortable viewing')
                    ->icon('heroicon-s-envelope')
                    ->collapsible()
                    ->schema([
                        Repeater::make('email_recipient')
                            ->label('Email Recipient')
                            ->addActionLabel('Add Email Recipient')
                            ->helperText('This email will receive all contact form responses. Min 1, Max 3')
                            ->minItems(1)
                            ->maxItems(3)
                            ->reorderableWithButtons()
                            ->required()
                            ->schema([
                                TextInput::make('email')
                                    ->label('Email')
                                    ->prefixIcon('heroicon-s-envelope')
                                    ->autocomplete(false)
                                    ->required(),
                            ])
                    ]),
            ]);
    }
}
