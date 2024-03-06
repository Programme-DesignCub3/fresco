<?php

namespace App\Filament\Clusters\General\Pages;

use App\Filament\Clusters\General;
use App\Settings\GeneralSettings;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Models\Media;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
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

        $data['black_intro_image'] = 'storage/' . $black_image[0]->path;
        $data['cappuccino_intro_image'] = 'storage/' . $cappuccino_image[0]->path;

        return $data;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Black Coffee
                Section::make('Black Coffee')
                    ->description('Minimize for comfortable viewing')
                    ->collapsible()
                    ->schema([
                        TextInput::make('black_intro_title')
                            ->label('Title')
                            ->required(),
                        RichEditor::make('black_intro_desc')
                            ->label('Description')
                            ->required(),
                        CuratorPicker::make('black_intro_image_id')
                            ->label('Image')
                            ->required()
                    ]),

                // Cappuccino
                Section::make('Cappuccino')
                    ->description('Minimize for comfortable viewing')
                    ->collapsible()
                    ->schema([
                        TextInput::make('cappuccino_intro_title')
                            ->label('Title')
                            ->required(),
                        RichEditor::make('cappuccino_intro_desc')
                            ->label('Description')
                            ->required(),
                        CuratorPicker::make('cappuccino_intro_image_id')
                            ->label('Image')
                            ->required()
                    ])
            ]);
    }
}
