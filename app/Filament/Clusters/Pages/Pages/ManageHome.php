<?php

namespace App\Filament\Clusters\Pages\Pages;

use App\Filament\Clusters\Pages;
use App\Rules\MaxWord;
use App\Settings\PageSettings;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Models\Media;
use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageHome extends SettingsPage
{
    protected ?string $heading = 'Home';

    protected ?string $subheading = 'Manage the home page settings';

    protected static ?string $navigationGroup = 'Pages';

    protected static ?string $navigationLabel = 'Home';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = PageSettings::class;

    protected static ?string $cluster = Pages::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $black_image = Media::where('id', $data['black_intro_image_id'])->first();
        if($data['black_video_collab'][0]['type'] == 'image') {
            $black_collab = Media::where('id', $data['black_video_collab'][0]['data']['image_id'])->first();
        }
        $cappuccino_image = Media::where('id', $data['cappuccino_intro_image_id'])->first();
        if($data['cappuccino_video_collab'][0]['type'] == 'image') {
            $cappuccino_collab = Media::where('id', $data['cappuccino_video_collab'][0]['data']['image_id'])->first();
        }

        $data['black_intro_image'] = 'storage/' . $black_image->path;
        ($data['black_video_collab'][0]['type'] == 'image') && $data['black_video_collab'][0]['data']['image'] = 'storage/' . $black_collab->path;
        $data['cappuccino_intro_image'] = 'storage/' . $cappuccino_image->path;
        ($data['cappuccino_video_collab'][0]['type'] == 'image') && $data['cappuccino_video_collab'][0]['data']['image'] = 'storage/' . $cappuccino_collab->path;

        return $data;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Introduction Section
                Section::make('Introduction Section')
                    ->description('Minimize for comfortable viewing')
                    ->icon('heroicon-c-newspaper')
                    ->collapsible()
                    ->schema([
                        Grid::make([
                            'default' => 1,
                            'sm' => 2
                        ])
                        ->schema([
                            Tabs::make('Theme')
                                ->tabs([
                                    // Introduction Section (Black Coffee)
                                    Tab::make('Black Coffee Theme')
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
                                        ])
                                    ]),
                            Tabs::make('Theme')
                                ->tabs([
                                    // Introduction Section (Cappuccino)
                                    Tab::make('Cappuccino Theme')
                                        ->schema([
                                            TextInput::make('cappuccino_intro_title')
                                                ->label('Title')
                                                ->rules([new MaxWord('Title', 8, 'en')])
                                                ->autocomplete(false)
                                                ->helperText('Maximum 8 words.')
                                                ->columns()
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
                        ])
                    ]),
                // Video & Collab Section
                Section::make('Video & Collab Section')
                    ->description('Minimize for comfortable viewing')
                    ->icon('heroicon-c-play')
                    ->collapsible()
                    ->schema([
                        Grid::make([
                            'default' => 1,
                            'sm' => 2
                        ])
                        ->schema([
                            Tabs::make('Theme')
                                ->tabs([
                                    // Video & Collab Section (Black Coffee)
                                    Tab::make('Black Coffee Theme')
                                        ->schema([
                                            TextInput::make('black_video_url')
                                                ->label('Video')
                                                ->autocomplete(false)
                                                ->url(true)
                                                ->helperText('Copy the video URL from YouTube.')
                                                ->prefixIcon('heroicon-c-link')
                                                ->required(),
                                            RichEditor::make('black_video_desc')
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
                                            Builder::make('black_video_collab')
                                                ->label('Collaboration')
                                                ->maxItems(1)
                                                ->blockNumbers(false)
                                                ->required()
                                                ->blocks([
                                                    Block::make('image')
                                                        ->icon('heroicon-o-photo')
                                                        ->schema([
                                                            CuratorPicker::make('image_id')
                                                                ->label('Image')
                                                                ->maxSize(2048)
                                                                ->acceptedFileTypes(['image/*'])
                                                                ->maxItems(1)
                                                                ->helperText('Maximum 2 MB.')
                                                                ->required(),
                                                            Hidden::make('image')
                                                        ]),
                                                    Block::make('text')
                                                        ->icon('heroicon-m-bars-3-bottom-left')
                                                        ->schema([
                                                            TextInput::make('text')
                                                                ->label('Text')
                                                                ->required()
                                                        ])
                                                ])
                                        ])
                                ]),
                            Tabs::make('Theme')
                                ->tabs([
                                    // Video & Collab Section (Cappuccino)
                                    Tab::make('Cappuccino Theme')
                                        ->schema([
                                            TextInput::make('cappuccino_video_url')
                                                ->label('Video')
                                                ->autocomplete(false)
                                                ->url(true)
                                                ->helperText('Copy the video URL from YouTube.')
                                                ->prefixIcon('heroicon-c-link')
                                                ->required(),
                                            RichEditor::make('cappuccino_video_desc')
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
                                            Builder::make('cappuccino_video_collab')
                                                ->label('Collaboration')
                                                ->maxItems(1)
                                                ->blockNumbers(false)
                                                ->required()
                                                ->blocks([
                                                    Block::make('image')
                                                        ->icon('heroicon-o-photo')
                                                        ->schema([
                                                            CuratorPicker::make('image_id')
                                                                ->label('Image')
                                                                ->maxSize(2048)
                                                                ->acceptedFileTypes(['image/*'])
                                                                ->maxItems(1)
                                                                ->helperText('Maximum 2 MB.')
                                                                ->required(),
                                                            Hidden::make('image')
                                                        ]),
                                                    Block::make('text')
                                                        ->icon('heroicon-m-bars-3-bottom-left')
                                                        ->schema([
                                                            TextInput::make('text')
                                                                ->label('Text')
                                                                ->required()
                                                        ])
                                                ])
                                        ])
                                ])
                        ])
                    ])
            ]);
    }
}
