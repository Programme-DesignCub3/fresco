<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use App\Rules\MaxWord;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\Filter;
use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;

class ArticleResource extends Resource
{
    protected static ?string $navigationGroup = 'Content';

    protected static ?string $slug = 'articles';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 1;

    protected static ?string $model = Article::class;

    public static function form(Form $form): Form
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
                    Section::make()
                        ->columnSpan([
                            'md' => 3,
                            'lg' => 4,
                            'xl' => 6,
                            '2xl' => 8
                        ])
                        ->schema([
                            TextInput::make('title')
                                ->label('Title')
                                ->autocomplete(false)
                                ->rules([new MaxWord('Title', 14, 'en')])
                                ->helperText('Maximum 14 words.')
                                ->required(),
                            Builder::make('content')
                                ->blocks([
                                    Block::make('paragraph')
                                        ->icon('heroicon-m-bars-3-bottom-left')
                                        ->schema([
                                            RichEditor::make('content')
                                                ->label('Paragraph')
                                                ->disableToolbarButtons([
                                                    'blockquote',
                                                    'codeBlock',
                                                    'attachFiles'
                                                ])
                                                ->required()
                                        ]),
                                    Block::make('image')
                                        ->icon('heroicon-o-photo')
                                        ->schema([
                                            CuratorPicker::make('content')
                                                ->label('Image')
                                                ->maxSize(2048)
                                                ->maxItems(1)
                                                ->acceptedFileTypes(['image/*'])
                                                ->helperText('Maximum 2 MB.')
                                                ->required(),
                                            Select::make('image_width')
                                                ->label('Image Width')
                                                ->default('auto')
                                                ->options([
                                                    'auto' => 'Auto',
                                                    '100' => '100%',
                                                    '80' => '80%',
                                                    '50' => '50%',
                                                ]),
                                            Select::make('image_align')
                                                ->label('Image Align')
                                                ->default('center')
                                                ->options([
                                                    'flex-start' => 'Left',
                                                    'center' => 'Center',
                                                    'flex-end' => 'Right',
                                                ])
                                        ]),
                                    Block::make('video')
                                        ->icon('heroicon-s-play')
                                        ->schema([
                                            TextInput::make('content')
                                                ->label('Video')
                                                ->url(true)
                                                ->prefixIcon('heroicon-c-link')
                                                ->helperText('Copy the video URL from YouTube.')
                                                ->required(),
                                            Select::make('video_width')
                                                ->label('Video Width')
                                                ->default('80')
                                                ->options([
                                                    'auto' => 'Auto',
                                                    '100' => '100%',
                                                    '80' => '80%',
                                                    '50' => '50%',
                                                ]),
                                            Select::make('video_align')
                                                ->label('Video Align')
                                                ->default('center')
                                                ->options([
                                                    'flex-start' => 'Left',
                                                    'center' => 'Center',
                                                    'flex-end' => 'Right',
                                                ])
                                        ]),
                                ])
                                ->label('Content')
                                ->blockNumbers(false)
                                ->reorderableWithButtons()
                                ->deletable(function($state) {
                                    $blocks = $state ?? [];
                                    $count = 0;
                                    foreach ($blocks as $block) {
                                        if (isset($block['type']) && $block['type'] === 'paragraph') {
                                            $count++;
                                        }
                                    }
                                    return ($count > 1) ? true : false;
                                })
                                ->default([
                                        [
                                        'type' => 'paragraph',
                                        'data' => [
                                            'content' => null
                                        ]
                                    ]
                                ])
                                ->required()
                        ]),
                    Section::make()
                        ->columnSpan([
                            'md' => 1,
                            'lg' => 2,
                            'xl' => 2,
                            '2xl' => 4
                        ])
                        ->schema([
                            Toggle::make('published')
                                ->inline(false)
                                ->label('Publish')
                                ->onIcon('heroicon-o-signal')
                                ->offIcon('heroicon-o-signal-slash')
                                ->helperText('Toggle to publish or unpublish this article.'),
                            CuratorPicker::make('image')
                                ->label('Featured Image')
                                ->maxSize(2048)
                                ->maxItems(1)
                                ->acceptedFileTypes(['image/*'])
                                ->helperText('Maximum 2 MB.')
                                ->required(),
                        ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                CuratorColumn::make('image')
                    ->width(80),
                TextColumn::make('title')
                    ->limit(50),
                ToggleColumn::make('published')
                    ->sortable()
                    ->onIcon('heroicon-o-signal')
                    ->offIcon('heroicon-o-signal-slash'),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('published')
                    ->options([
                        0 => 'Unpublished',
                        1 => 'Published',
                    ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
