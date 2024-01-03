<?php

namespace App\Filament\Pages;

use App\Settings\HomeSettings;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageHome extends SettingsPage
{
    protected static ?string $navigationGroup = 'Settings & Media';

    protected static ?string $navigationLabel = 'Manage Home';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

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
                 * <START> Product List Section
                 */
                Section::make('Product List Section')
                    ->description('Managing product list of coffee')
                    ->icon('heroicon-s-shopping-cart')
                    ->columns(2)
                    ->schema([
                        Tabs::make('Theme')
                            ->tabs([
                                Tab::make('Black Coffee')
                                    ->icon('heroicon-s-plus-circle')
                                    ->schema([
                                        Repeater::make('Black Coffee Product List')
                                            ->label('Black Coffee Product List')
                                            ->schema([
                                                TextInput::make('black_product_name')
                                                    ->label('Product Name')
                                                    ->required(),
                                                CuratorPicker::make('black_product_image')
                                                    ->label('Product Image')
                                                    ->required()
                                            ])
                                    ])
                            ]),
                        Tabs::make('Theme')
                            ->tabs([
                                Tab::make('Cappuccino Coffee')
                                    ->icon('heroicon-o-plus-circle')
                                    ->schema([
                                        Repeater::make('Cappuccino Coffee Product List')
                                            ->label('Cappuccino Coffee Product List')
                                            ->schema([
                                                TextInput::make('cappuccino_product_name')
                                                    ->label('Product Name')
                                                    ->required(),
                                                CuratorPicker::make('cappuccino_product_image')
                                                    ->label('Product Image')
                                                    ->required()
                                            ]),
                                    ])
                            ])
                    ]),
                /**
                 * <END> Product List Section
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
                                        Repeater::make('Black Coffee Description List')
                                            ->label('Black Coffee Description List')
                                            ->schema([
                                                TextInput::make('black_desc_title')
                                                    ->label('Title')
                                                    ->required(),
                                                Textarea::make('black_desc_explanation')
                                                    ->label('Explanation')
                                                    ->rows(5)
                                                    ->required(),
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
                                            Repeater::make('Cappuccino Coffee Description List')
                                                ->label('Cappuccino Coffee Description List')
                                                ->schema([
                                                    TextInput::make('cappuccino_desc_title')
                                                        ->label('Title')
                                                        ->required(),
                                                    Textarea::make('cappuccino_desc_explanation')
                                                        ->label('Explanation')
                                                        ->rows(5)
                                                        ->required(),
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
