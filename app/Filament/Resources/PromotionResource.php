<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromotionResource\Pages;
use App\Filament\Resources\PromotionResource\RelationManagers;
use App\Models\Promo;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
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
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PromotionResource extends Resource
{
    protected static ?string $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'Promotions';

    protected static ?string $modelLabel = 'promotions';

    protected static ?string $navigationIcon = 'heroicon-c-tag';

    protected static ?int $navigationSort = 4;

    protected static ?string $model = Promo::class;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() >= 0 ? 'warning' : '';
    }

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
                                ->required(),
                            RichEditor::make('description')
                                ->label('Description')
                                ->disableToolbarButtons([
                                    'h2',
                                    'h3',
                                    'bulletList',
                                    'orderedList',
                                    'attachFiles',
                                    'codeBlock',
                                    'blockquote',
                                    'link'
                                ])
                                ->required(),
                            Repeater::make('links')
                                ->minItems(1)
                                ->schema([
                                    TextInput::make('link')
                                        ->label('Link')
                                        ->url(true)
                                        ->prefixIcon('heroicon-c-link')
                                        ->helperText('Link related to the promotion.')
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
                            CuratorPicker::make('image')
                                ->maxSize(2048)
                                ->label('Image')
                                ->maxItems(1)
                                ->acceptedFileTypes(['image/*'])
                                ->helperText('Maximum 2 MB.')
                                ->required(),
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
                    ->limit(50),
                TextColumn::make('description')
                    ->label('Description')
                    ->html()
                    ->limit(50),
                CheckboxColumn::make('pin')
                    ->sortable()
                    ->beforeStateUpdated(function($record, $state) {
                        $check = Promo::where('pin', 1);
                        ($check->count() >= 1) && $check->update(['pin' => 0]);
                    })
                    ->afterStateUpdated(function ($record, $state) {
                        $record->pin = $state;
                        $record->save();
                    }),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('pin')
                    ->label('Pinned')
                    ->query(fn (EloquentBuilder $query): EloquentBuilder => $query->where('pin', true))
            ])
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
            'index' => Pages\ListPromotions::route('/'),
            'create' => Pages\CreatePromotion::route('/create'),
            'edit' => Pages\EditPromotion::route('/{record}/edit'),
        ];
    }
}
