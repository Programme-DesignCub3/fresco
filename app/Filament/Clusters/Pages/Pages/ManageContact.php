<?php

namespace App\Filament\Clusters\Pages\Pages;

use App\Filament\Clusters\Pages;
use App\Rules\MaxWord;
use App\Settings\PageSettings;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Models\Media;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageContact extends SettingsPage
{
    protected ?string $heading = 'Contact';

    protected ?string $subheading = 'Manage the contact page settings';

    protected static ?string $navigationGroup = 'Pages';

    protected static ?string $navigationLabel = 'Contact';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = PageSettings::class;

    protected static ?string $cluster = Pages::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $black_image = Media::where('id', $data['cn_black_banner_image_id'])->first();
        $cappuccino_image = Media::where('id', $data['cn_cappuccino_banner_image_id'])->first();

        $data['cn_black_banner_image'] = 'storage/' . $black_image->path;
        $data['cn_cappuccino_banner_image'] = 'storage/' . $cappuccino_image->path;

        return $data;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Heading Banner
                Section::make('Heading Banner')
                    ->description('Minimize for comfortable viewing')
                    ->icon('heroicon-m-photo')
                    ->collapsible()
                    ->schema([
                        Grid::make([
                            'default' => 1,
                            'sm' => 2
                        ])
                        ->schema([
                            Tabs::make('Theme')
                                ->tabs([
                                    // Heading Banner (Black Coffee)
                                    Tab::make('Black Coffee Theme')
                                        ->schema([
                                            TextInput::make('cn_black_banner_title')
                                                ->label('Title')
                                                ->rules([new MaxWord('Title', 8, 'en')])
                                                ->autocomplete(false)
                                                ->helperText('Maximum 8 words.')
                                                ->required(),
                                            Radio::make('cn_black_banner_position')
                                                ->label('Position')
                                                ->options([
                                                    'left' => 'Left',
                                                    'center' => 'Center',
                                                    'right' => 'Right'
                                                ])
                                                ->required(),
                                            CuratorPicker::make('cn_black_banner_image_id')
                                                ->label('Image')
                                                ->maxSize(2048)
                                                ->acceptedFileTypes(['image/*'])
                                                ->maxItems(1)
                                                ->helperText('Maximum 2 MB.')
                                                ->required()
                                        ])
                                ]),
                            Tabs::make('Theme')
                                ->tabs([
                                    // Heading Banner (Cappuccino)
                                    Tab::make('Cappuccino Theme')
                                        ->schema([
                                            TextInput::make('cn_cappuccino_banner_title')
                                                ->label('Title')
                                                ->rules([new MaxWord('Title', 8, 'en')])
                                                ->autocomplete(false)
                                                ->helperText('Maximum 8 words.')
                                                ->required(),
                                            Radio::make('cn_cappuccino_banner_position')
                                                ->label('Position')
                                                ->options([
                                                    'left' => 'Left',
                                                    'center' => 'Center',
                                                    'right' => 'Right'
                                                ])
                                                ->required(),
                                            CuratorPicker::make('cn_cappuccino_banner_image_id')
                                                ->label('Image')
                                                ->maxSize(2048)
                                                ->acceptedFileTypes(['image/*'])
                                                ->maxItems(1)
                                                ->helperText('Maximum 2 MB.')
                                                ->required()
                                        ])
                                ]),
                        ])
                    ])
            ]);
    }
}
