<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Activity;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ActivityResource\Pages;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use App\Rules\MaxWord;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;

class ActivityResource extends Resource
{
    protected static ?string $navigationGroup = 'Content';

    protected static ?int $navigationSort = 2;

    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-s-puzzle-piece';

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
                                ->label('Title (Optional)')
                                ->helperText('Max 10 words.')
                                ->rules([new MaxWord('Title', 10, 'en')]),
                            RichEditor::make('description')
                                ->label('Description (Optional)')
                                ->toolbarButtons([
                                    'bold',
                                    'italic',
                                    'underline',
                                    'strike',
                                    'undo',
                                    'redo'
                                ]),
                            Repeater::make('links')
                                ->minItems(1)
                                ->schema([
                                    TextInput::make('link')
                                        ->label('Link')
                                        ->url(true)
                                        ->prefixIcon('heroicon-c-link')
                                        ->helperText('Link related to the activity.')
                                        ->required(),
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
                            Grid::make([
                                'default' => 1,
                                'sm' => 2,
                            ])
                            ->schema([
                                DatePicker::make('start_date')
                                    ->label('Start Period')
                                    ->helperText('The activity will be visible from this date.')
                                    ->columns()
                                    ->required(),
                                DatePicker::make('end_date')
                                    ->label('End Period')
                                    ->helperText('The activity will be visible until this date.')
                                    ->columns()
                                    ->required(),
                            ]),
                            CuratorPicker::make('image')
                                ->maxSize(2048)
                                ->label('Image')
                                ->maxItems(1)
                                ->acceptedFileTypes(['image/*'])
                                ->helperText('Maximum 2 MB.')
                                ->required(),
                            CuratorPicker::make('image_portrait')
                                ->maxSize(2048)
                                ->acceptedFileTypes(['image/*'])
                                ->maxItems(1)
                                ->helperText('Maximum 2 MB.')
                                ->label('Image Portrait (Optional)'),
                        ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                CuratorColumn::make('image')
                    ->label('Image')
                    ->width(120),
                TextColumn::make('title')
                    ->label('Title')
                    ->placeholder('No title')
                    ->limit(50),
                TextColumn::make('description')
                    ->label('Description')
                    ->placeholder('No description')
                    ->html()
                    ->limit(50)
            ])
            ->filters([
                //
            ])
            ->paginated(false)
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
            'index' => Pages\ListActivities::route('/'),
            'create' => Pages\CreateActivity::route('/create'),
            'edit' => Pages\EditActivity::route('/{record}/edit'),
        ];
    }
}
