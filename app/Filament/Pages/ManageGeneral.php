<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageGeneral extends SettingsPage
{
    protected static ?string $navigationGroup = 'Settings & Gallery';

    protected static ?string $navigationLabel = 'General';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected ?string $subheading = 'Controls all general content';

    protected static string $settings = GeneralSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                /**
                 * <START> Menu Section
                 */
                Section::make('Menu Section')
                    ->description('Managing content of menu (Theme Choice)')
                    ->icon('heroicon-m-user-group')
                    ->columns(2)
                    ->schema([
                        Tabs::make('Theme')
                            ->tabs([
                                Tab::make('Black Coffee')
                                    ->icon('heroicon-s-plus-circle')
                                    ->schema([
                                        CuratorPicker::make('black_menu_bg')
                                            ->label('Menu Background')
                                            ->required(),
                                        CuratorPicker::make('black_menu_coffee')
                                            ->label('Menu Image (Coffee)')
                                            ->required()
                                    ])
                            ]),
                        Tabs::make('Theme')
                            ->tabs([
                                Tab::make('Cappuccino Coffee')
                                    ->icon('heroicon-o-plus-circle')
                                    ->schema([
                                        CuratorPicker::make('cappuccino_menu_bg')
                                            ->label('Menu Background')
                                            ->required(),
                                        CuratorPicker::make('cappuccino_menu_coffee')
                                            ->label('Menu Image (Coffee)')
                                            ->required()
                                    ])
                            ]),
                    ]),
                /**
                 * <END> Menu Section
                 */

                /**
                 * <START> Social Media Link
                 */
                Section::make('Social Media Link')
                    ->description('Managing link of social media')
                    ->icon('heroicon-m-user-group')
                    ->columns(2)
                    ->schema([
                        Fieldset::make(null)
                            ->columns(3)
                            ->schema([
                                TextInput::make('facebook_link')
                                    ->label('Facebook'),
                                TextInput::make('instagram_link')
                                    ->label('Instagram'),
                                TextInput::make('x_link')
                                    ->label('X (Twitter)'),
                                TextInput::make('tiktok_link')
                                    ->label('Tiktok'),
                                TextInput::make('youtube_link')
                                    ->label('YouTube'),
                                TextInput::make('whatsapp_link')
                                    ->label('WhatsApp'),
                            ]),
                    ])
                /**
                 * <END> Social Media Link
                 */
            ]);
    }
}
