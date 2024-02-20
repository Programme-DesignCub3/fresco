<?php

namespace App\Filament\Pages;

use App\Settings\HomeSettings;
use Awcodes\Curator\Components\Forms\CuratorPicker;
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

class ManageHome extends SettingsPage
{
    protected static ?string $navigationGroup = 'Configuration';

    protected static ?string $navigationLabel = 'Home';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected ?string $subheading = 'Controls all home page content';

    protected static string $settings = HomeSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                /**
                 * <START> Introduction Section
                 */
                Section::make('Introduction Section')
                    ->description('Managing content in the introduction section')
                    ->icon('heroicon-s-clipboard-document-list')
                    ->columns(2)
                    ->schema([
                        RichEditor::make('aaaaa'),
                        Tabs::make('Theme')
                            ->tabs([
                                Tab::make('Black Coffee')
                                    ->icon('heroicon-s-plus-circle')
                                    ->schema([
                                        TextInput::make('black_intro_title')
                                            ->label('Title')
                                            ->required(),
                                        Textarea::make('black_intro_desc')
                                            ->label('Description')
                                            ->rows(5)
                                            ->required(),
                                        CuratorPicker::make('black_intro_image')
                                            ->label('Image')
                                            ->required()
                                    ]),
                            ]),
                        Tabs::make('Theme')
                            ->tabs([
                                Tab::make('Cappuccino Coffee')
                                    ->icon('heroicon-o-plus-circle')
                                    ->schema([
                                        TextInput::make('cappuccino_intro_title')
                                            ->label('Title')
                                            ->required(),
                                        Textarea::make('cappuccino_intro_desc')
                                            ->label('Description')
                                            ->rows(5)
                                            ->required(),
                                        CuratorPicker::make('cappuccino_intro_image')
                                            ->label('Image')
                                            ->required()
                                    ])
                            ]),
                    ]),
                /**
                 * <END> Introduction Section
                 */

                /**
                 * <START> Video & Collaboration Section
                 */
                Section::make('Video & Collaboration Section')
                    ->description('Managing content in the video & collaboration section')
                    ->icon('heroicon-s-play')
                    ->columns(2)
                    ->schema([
                        Tabs::make('Theme')
                            ->tabs([
                                Tab::make('Black Coffee')
                                    ->icon('heroicon-s-plus-circle')
                                    ->schema([
                                        TextInput::make('black_video_url')
                                            ->label('Video URL')
                                            ->required(),
                                        Textarea::make('black_video_desc')
                                            ->label('Description')
                                            ->rows(5)
                                            ->required(),
                                        CuratorPicker::make('black_video_collab')
                                            ->label('Collaboration Image')
                                            ->required()
                                    ]),
                            ]),
                        Tabs::make('Theme')
                            ->tabs([
                                Tab::make('Cappuccino Coffee')
                                    ->icon('heroicon-o-plus-circle')
                                    ->schema([
                                        TextInput::make('cappuccino_video_url')
                                            ->label('Video URL')
                                            ->required(),
                                        Textarea::make('cappuccino_video_desc')
                                            ->label('Description')
                                            ->rows(5)
                                            ->required(),
                                        CuratorPicker::make('cappuccino_video_collab')
                                            ->label('Collaboration Image')
                                            ->required()
                                    ])
                            ])
                    ]),
                /**
                 * <END> Video & Collaboration Section
                 */

                 /**
                  * <START> Description Section
                  */
                  Section::make('Description Section')
                        ->description('Managing description content section')
                        ->icon('heroicon-o-bars-3-center-left')
                        ->columns(2)
                        ->schema([
                            Tabs::make('Theme')
                                ->tabs([
                                    Tab::make('Black Coffee')
                                        ->icon('heroicon-s-plus-circle')
                                        ->schema([
                                            Repeater::make('black_desc_list')
                                                ->label('Black Coffee Description List')
                                                ->addActionLabel('Add to Black Coffee Description List')
                                                ->reorderableWithButtons()
                                                ->schema([
                                                    TextInput::make('black_desc_title')
                                                        ->label('Title')
                                                        ->required(),
                                                    Textarea::make('black_desc_explanation')
                                                        ->label('Explanation')
                                                        ->rows(5)
                                                        ->required(),
                                                    Radio::make('black_desc_position')
                                                        ->label('Position')
                                                        ->options([
                                                            'left' => 'Left',
                                                            'right' => 'Right'
                                                        ])
                                                        ->descriptions([
                                                            'left' => 'The left position starts from the image to the text',
                                                            'right' => 'The right position starts from the text to the image'
                                                        ]),
                                                    CuratorPicker::make('black_desc_image')
                                                        ->label('Image')
                                                        ->required()
                                                ])
                                        ])
                                ]),
                            Tabs::make('Theme')
                                ->tabs([
                                    Tab::make('Cappuccino Coffee')
                                        ->icon('heroicon-o-plus-circle')
                                        ->schema([
                                            Repeater::make('cappuccino_desc_list')
                                                ->label('Cappuccino Coffee Description List')
                                                ->addActionLabel('Add to Cappuccino Coffee Description List')
                                                ->reorderableWithButtons()
                                                ->schema([
                                                    TextInput::make('cappuccino_desc_title')
                                                        ->label('Title')
                                                        ->required(),
                                                    Textarea::make('cappuccino_desc_explanation')
                                                        ->label('Explanation')
                                                        ->rows(5)
                                                        ->required(),
                                                    Radio::make('cappuccino_desc_position')
                                                        ->label('Position')
                                                        ->options([
                                                            'left' => 'Left',
                                                            'right' => 'Right'
                                                        ])
                                                        ->descriptions([
                                                            'left' => 'The left position starts from the image to the text',
                                                            'right' => 'The right position starts from the text to the image'
                                                        ]),
                                                    CuratorPicker::make('cappuccino_desc_image')
                                                        ->label('Image')
                                                        ->required()
                                                ])
                                        ])
                                ])
                        ])
                 /**
                  * <END> Description Section
                  */
            ]);
    }
}
