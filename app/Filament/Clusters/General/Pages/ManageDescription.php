<?php

namespace App\Filament\Clusters\General\Pages;

use App\Filament\Clusters\General;
use App\Rules\MaxWord;
use App\Settings\GeneralSettings;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Models\Media;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageDescription extends SettingsPage
{
    protected ?string $heading = 'Description';

    protected ?string $subheading = 'Manage description section';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'Description';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = GeneralSettings::class;

    protected static ?string $cluster = General::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        for($i = 0; $i < count($data['black_desc_list']); $i++) {
            $data['black_desc_list'][$i]['black_desc_image'] = 'storage/' . Media::where('id', $data['black_desc_list'][$i]['black_desc_image_id'])->first()->path;
        }

        for($i = 0; $i < count($data['cappuccino_desc_list']); $i++) {
            $data['cappuccino_desc_list'][$i]['cappuccino_desc_image'] = 'storage/' . Media::where('id', $data['cappuccino_desc_list'][$i]['cappuccino_desc_image_id'])->first()->path;
        }

        return $data;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Description Section
                Section::make('Description Section')
                    ->description('Minimize for comfortable viewing')
                    ->icon('heroicon-m-rectangle-stack')
                    ->collapsible()
                    ->schema([
                        Grid::make([
                            'default' => 1,
                            'sm' => 2
                        ])
                        ->schema([
                            Tabs::make('Theme')
                                ->tabs([
                                    // Description Section (Black)
                                    Tab::make('Black Coffee Theme')
                                        ->schema([
                                            Repeater::make('black_desc_list')
                                            ->label('Black Coffee Description List')
                                            ->addActionLabel('Add to black coffee description list')
                                            ->reorderableWithButtons()
                                            ->required()
                                            ->schema([
                                                TextInput::make('black_desc_title')
                                                    ->label('Title')
                                                    ->rules([new MaxWord('Title', 8, 'en')])
                                                    ->helperText('Maximum 8 words.')
                                                    ->autocomplete(false)
                                                    ->required(),
                                                RichEditor::make('black_desc_explanation')
                                                    ->disableToolbarButtons([
                                                        'h2',
                                                        'h3',
                                                        'bulletList',
                                                        'orderedList',
                                                        'attachFiles',
                                                        'codeBlock',
                                                        'blockquote'
                                                    ])
                                                    ->label('Explanation')
                                                    ->required(),
                                                Radio::make('black_desc_position')
                                                    ->required()
                                                    ->label('Position')
                                                    ->options([
                                                        'left' => 'Left',
                                                        'right' => 'Right'
                                                    ])
                                                    ->descriptions([
                                                        'left' => 'The left position starts from the image to the text',
                                                        'right' => 'The right position starts from the text to the image'
                                                    ]),
                                                CuratorPicker::make('black_desc_image_id')
                                                    ->label('Image')
                                                    ->maxSize(2048)
                                                    ->acceptedFileTypes(['image/*'])
                                                    ->maxItems(1)
                                                    ->helperText('Recommended to upload image with aspect ratio 1:1. Maximum 2 MB.')
                                                    ->required()
                                            ])
                                        ])
                                ]),
                        Tabs::make('Theme')
                            ->tabs([
                                // Description Section (Cappuccino)
                                Tab::make('Cappuccino Theme')
                                    ->schema([
                                        Repeater::make('cappuccino_desc_list')
                                            ->label('Cappuccino Coffee Description List')
                                            ->addActionLabel('Add to cappuccino coffee description list')
                                            ->reorderableWithButtons()
                                            ->required()
                                            ->schema([
                                                TextInput::make('cappuccino_desc_title')
                                                    ->label('Title')
                                                    ->rules([new MaxWord('Title', 8, 'en')])
                                                    ->helperText('Maximum 8 words.')
                                                    ->autocomplete(false)
                                                    ->required(),
                                                RichEditor::make('cappuccino_desc_explanation')
                                                    ->disableToolbarButtons([
                                                        'h2',
                                                        'h3',
                                                        'bulletList',
                                                        'orderedList',
                                                        'attachFiles',
                                                        'codeBlock',
                                                        'blockquote'
                                                    ])
                                                    ->label('Explanation')
                                                    ->required(),
                                                Radio::make('cappuccino_desc_position')
                                                    ->required()
                                                    ->label('Position')
                                                    ->options([
                                                        'left' => 'Left',
                                                        'right' => 'Right'
                                                    ])
                                                    ->descriptions([
                                                        'left' => 'The left position starts from the image to the text',
                                                        'right' => 'The right position starts from the text to the image'
                                                    ]),
                                                CuratorPicker::make('cappuccino_desc_image_id')
                                                    ->label('Image')
                                                    ->maxSize(2048)
                                                    ->acceptedFileTypes(['image/*'])
                                                    ->maxItems(1)
                                                    ->helperText('Recommended to upload image with aspect ratio 1:1. Maximum 2 MB.')
                                                    ->required()
                                            ])
                                    ])
                            ])
                        ])
                    ])
            ]);
    }
}
