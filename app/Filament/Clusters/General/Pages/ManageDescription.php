<?php

namespace App\Filament\Clusters\General\Pages;

use App\Filament\Clusters\General;
use App\Settings\GeneralSettings;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageDescription extends SettingsPage
{
    protected ?string $heading = 'Description';

    protected ?string $subheading = 'Controls description section';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'Description';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = GeneralSettings::class;

    protected static ?string $cluster = General::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Black Coffee
                Section::make('Black Coffee')
                    ->description('Minimize for comfortable viewing')
                    ->collapsible()
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
                    ]),

                // Cappuccino
                Section::make('Cappuccino')
                    ->description('Minimize for comfortable viewing')
                    ->collapsible()
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
                    ]),
            ]);
    }
}
