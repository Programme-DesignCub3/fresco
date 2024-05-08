<?php

namespace App\Filament\Clusters\General\Pages;

use App\Filament\Clusters\General;
use App\Rules\MaxWord;
use App\Settings\GeneralSettings;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Models\Media;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageIntro extends SettingsPage
{
    protected ?string $heading = 'Introduction';

    protected ?string $subheading = 'Controls introduction section';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'Introduction';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = GeneralSettings::class;

    protected static ?string $cluster = General::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $black_image = Media::where('id', $data['black_intro_image_id'])->get();
        $cappuccino_image = Media::where('id', $data['cappuccino_intro_image_id'])->get();

        $data['black_intro_image'] = 'storage/' . $black_image->first()->path;
        $data['cappuccino_intro_image'] = 'storage/' . $cappuccino_image->first()->path;

        return $data;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'default' => 1,
                    'sm' => 2,
                    'md' => 4,
                    'lg' => 6,
                    'xl' => 8,
                    '2xl' => 12,
                ])
                    ->schema([
                        // Black Coffee
                        Section::make('Black Coffee')
                            ->columnSpan([
                                '2xl' => 6,
                            ])
                            ->description('Minimize for comfortable viewing')
                            ->collapsible()
                            ->schema([
                                TextInput::make('black_intro_title')
                                    ->label('Title')
                                    ->rules([new MaxWord('Title', 8, 'en')])
                                    ->autocomplete(false)
                                    ->helperText('Maximum 8 words.')
                                    ->required(),
                                RichEditor::make('black_intro_desc')
                                    ->disableToolbarButtons([
                                        'h2',
                                        'h3',
                                        'bulletList',
                                        'orderedList',
                                        'attachFiles',
                                        'codeBlock',
                                        'blockquote'
                                    ])
                                    ->label('Description')
                                    ->required(),
                                CuratorPicker::make('black_intro_image_id')
                                    ->label('Image')
                                    ->maxSize(2048)
                                    ->acceptedFileTypes(['image/*'])
                                    ->maxItems(1)
                                    ->helperText('Maximum 2 MB.')
                                    ->required()
                            ]),

                        // Cappuccino Coffee
                        Section::make('Cappuccino Coffee')
                            ->columnSpan([
                                '2xl' => 6,
                            ])
                            ->description('Minimize for comfortable viewing')
                            ->collapsible()
                            ->schema([
                                TextInput::make('cappuccino_intro_title')
                                    ->label('Title')
                                    ->rules([new MaxWord('Title', 8, 'en')])
                                    ->autocomplete(false)
                                    ->helperText('Maximum 8 words.')
                                    ->required(),
                                RichEditor::make('cappuccino_intro_desc')
                                    ->disableToolbarButtons([
                                        'h2',
                                        'h3',
                                        'bulletList',
                                        'orderedList',
                                        'attachFiles',
                                        'codeBlock',
                                        'blockquote'
                                    ])
                                    ->label('Description')
                                    ->required(),
                                CuratorPicker::make('cappuccino_intro_image_id')
                                    ->label('Image')
                                    ->maxSize(2048)
                                    ->acceptedFileTypes(['image/*'])
                                    ->maxItems(1)
                                    ->helperText('Maximum 2 MB.')
                                    ->required()
                            ])
                    ])
            ]);
    }
}
