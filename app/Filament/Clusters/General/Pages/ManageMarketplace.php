<?php

namespace App\Filament\Clusters\General\Pages;

use App\Filament\Clusters\General;
use App\Settings\GeneralSettings;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageMarketplace extends SettingsPage
{
    protected ?string $heading = 'Marketplace';

    protected ?string $subheading = 'Controls online marketplace';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationGroup = 'Link';

    protected static ?string $navigationLabel = 'Marketplace';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = GeneralSettings::class;

    protected static ?string $cluster = General::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Marketplace')
                    ->description('Minimize for comfortable viewing')
                    ->collapsible()
                    ->columns(2)
                    ->schema([
                        TextInput::make('tokopedia_store')
                            ->prefixIcon('heroicon-c-link')
                            ->label('Tokopedia'),
                        TextInput::make('shopee_store')
                            ->prefixIcon('heroicon-c-link')
                            ->label('Shopee'),
                        TextInput::make('lazada_store')
                            ->prefixIcon('heroicon-c-link')
                            ->label('Lazada'),
                        TextInput::make('kapalapi_store')
                            ->prefixIcon('heroicon-c-link')
                            ->label('Kapal Api Store'),
                    ])
            ]);
    }
}
