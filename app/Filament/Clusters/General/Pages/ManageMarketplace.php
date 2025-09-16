<?php

namespace App\Filament\Clusters\General\Pages;

use App\Filament\Clusters\General;
use App\Settings\GeneralSettings;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Models\Media;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageMarketplace extends SettingsPage
{
    protected ?string $heading = 'Marketplace';

    protected ?string $subheading = 'Manage online marketplace';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Link';

    protected static ?string $navigationLabel = 'Marketplace';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = GeneralSettings::class;

    protected static ?string $cluster = General::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        for($i = 0; $i < count($data['marketplaces']); $i++) {
            $data['marketplaces'][$i]['marketplace_image'] = 'storage/' . Media::where('id', $data['marketplaces'][$i]['marketplace_image_id'])->first()->path;
        }

        return $data;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Marketplace
                Section::make('Marketplace')
                    ->description('Minimize for comfortable viewing')
                    ->icon('heroicon-o-globe-alt')
                    ->collapsible()
                    ->schema([
                        Repeater::make('marketplaces')
                            ->label('Marketplaces')
                            ->reorderableWithButtons()
                            ->columns(2)
                            ->required()
                            ->schema([
                                TextInput::make('marketplace_name')
                                    ->label('Name')
                                    ->autocomplete(false)
                                    ->required(),
                                TextInput::make('marketplace_url')
                                    ->label('Link')
                                    ->url()
                                    ->helperText('Link related to the marketplace.')
                                    ->prefixIcon('heroicon-c-link')
                                    ->autocomplete(false)
                                    ->required(),
                                CuratorPicker::make('marketplace_image_id')
                                    ->label('Image')
                                    ->maxItems(1)
                                    ->acceptedFileTypes(['image/*'])
                                    ->helperText('Recomendation Size 160px x 65px | Upload image with a transparent or white background. Max 2 MB.')
                                    ->columnSpan(2)
                                    ->maxSize(2048)
                                    ->required()
                            ])
                    ])
            ]);
    }
}
