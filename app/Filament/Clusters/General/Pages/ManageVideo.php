<?php

namespace App\Filament\Clusters\General\Pages;

use App\Filament\Clusters\General;
use App\Settings\GeneralSettings;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Models\Media;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageVideo extends SettingsPage
{
    protected ?string $heading = 'Video & Collab';

    protected ?string $subheading = 'Controls video & collab section';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'Video & Collab';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = GeneralSettings::class;

    protected static ?string $cluster = General::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $black_collab_image = Media::where('id', $data['black_video_collab_id'])->get();
        $cappuccino_collab_image = Media::where('id', $data['cappuccino_video_collab_id'])->get();

        $data['black_video_collab'] = 'storage/' . $black_collab_image[0]->path;
        $data['cappuccino_video_collab'] = 'storage/' . $cappuccino_collab_image[0]->path;

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
                        TextInput::make('black_video_url')
                            ->label('Video URL')
                            ->required(),
                        RichEditor::make('black_video_desc')
                            ->label('Description')
                            ->required(),
                        CuratorPicker::make('black_video_collab_id')
                            ->label('Collaboration Image')
                            ->required()
                    ]),

                // Cappuccino
                Section::make('Cappuccino')
                    ->description('Minimize for comfortable viewing')
                    ->collapsible()
                    ->schema([
                        TextInput::make('cappuccino_video_url')
                            ->label('Video URL')
                            ->required(),
                        RichEditor::make('cappuccino_video_desc')
                            ->label('Description')
                            ->required(),
                        CuratorPicker::make('cappuccino_video_collab_id')
                            ->label('Collaboration Image')
                            ->required()
                        ])
            ]);
    }
}
