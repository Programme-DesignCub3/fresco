<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityResource\Pages;
use App\Filament\Resources\ActivityResource\RelationManagers;
use App\Models\Activity;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActivityResource extends Resource
{
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Content';

    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-s-puzzle-piece';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Grid::make([
                            'default' => 1,
                            'sm' => 2,
                            'md' => 4,
                            'lg' => 6,
                            'xl' => 8,
                            '2xl' => 12,
                        ])->schema([
                            CuratorPicker::make('image')
                                ->columnSpan([
                                    'md' => 2,
                                    'lg' => 3,
                                    'xl' => 4,
                                    '2xl' => 6,
                                ])
                                ->maxSize(2048)
                                ->label('Image')
                                ->required(),
                            CuratorPicker::make('image_portrait')
                                ->columnSpan([
                                    'md' => 2,
                                    'lg' => 3,
                                    'xl' => 4,
                                    '2xl' => 6,
                                ])
                                ->maxSize(2048)
                                ->label('Image Portrait (Optional)'),
                        ]),
                        TextInput::make('link')
                            ->label('Link')
                            ->suffixIcon('heroicon-c-link')
                            ->required(),
                        Hidden::make('sort')
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
                IconColumn::make('image_portrait')
                    ->label('Image Portrait')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark'),
                TextColumn::make('link')
                    ->label('Link')
                    ->limit(60)
            ])
            ->filters([
                //
            ])
            ->reorderable('sort')
            ->defaultSort('sort')
            ->modifyQueryUsing(fn (Builder $query) => $query->orderBy('sort'))
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageActivities::route('/'),
        ];
    }
}
