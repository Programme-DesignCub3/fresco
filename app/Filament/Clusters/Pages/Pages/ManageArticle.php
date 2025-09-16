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
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageArticle extends SettingsPage
{
    protected ?string $heading = 'Article';

    protected ?string $subheading = 'Manage the article page settings';

    protected static ?string $navigationGroup = 'Pages';

    protected static ?string $navigationLabel = 'Article';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = PageSettings::class;

    protected static ?string $cluster = Pages::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $black_image = Media::where('id', $data['ar_black_banner_image_id'])->first();
        $cappuccino_image = Media::where('id', $data['ar_cappuccino_banner_image_id'])->first();

        $data['ar_black_banner_image'] = 'storage/' . $black_image->path;
        $data['ar_cappuccino_banner_image'] = 'storage/' . $cappuccino_image->path;

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
                                            Textarea::make('ar_black_banner_title')
                                                ->label('Title')
                                                ->rules([new MaxWord('Title', 8, 'en')])
                                                ->autocomplete(false)
                                                ->helperText('Max 8 words.')
                                                ->required(),
                                            Radio::make('ar_black_banner_position')
                                                ->label('Position')
                                                ->options([
                                                    'text-left' => 'Left',
                                                    'text-center' => 'Center',
                                                    'text-right' => 'Right'
                                                ])
                                                ->required(),
                                            CuratorPicker::make('ar_black_banner_image_id')
                                                ->label('Image')
                                                ->maxSize(2048)
                                                ->acceptedFileTypes(['image/*'])
                                                ->maxItems(1)
                                                ->helperText('Width (adjust) x Height 312px | Max 2 MB.')
                                                ->required()
                                        ])
                                ]),
                            Tabs::make('Theme')
                                ->tabs([
                                    // Heading Banner (Cappuccino)
                                    Tab::make('Cappuccino Theme')
                                        ->schema([
                                            Textarea::make('ar_cappuccino_banner_title')
                                                ->label('Title')
                                                ->rules([new MaxWord('Title', 8, 'en')])
                                                ->autocomplete(false)
                                                ->helperText('Max 8 words.')
                                                ->required(),
                                            Radio::make('ar_cappuccino_banner_position')
                                                ->label('Position')
                                                ->options([
                                                    'text-left' => 'Left',
                                                    'text-center' => 'Center',
                                                    'text-right' => 'Right'
                                                ])
                                                ->required(),
                                            CuratorPicker::make('ar_cappuccino_banner_image_id')
                                                ->label('Image')
                                                ->maxSize(2048)
                                                ->acceptedFileTypes(['image/*'])
                                                ->maxItems(1)
                                                ->helperText('Width (adjust) x Height 312px | Max 2 MB.')
                                                ->required()
                                        ])
                                ]),
                        ])
                    ]),
            ]);
    }
}
