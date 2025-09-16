<?php

namespace App\Filament\Clusters\Products\Resources;

use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Clusters\Products;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use App\Filament\Clusters\Products\Resources\ProductResource\Pages;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;

class ProductResource extends Resource
{
    protected static ?string $navigationGroup = 'Manage';

    protected static ?string $slug = 'all-products';

    protected static ?string $navigationLabel = 'Products';

    protected static ?string $navigationIcon = 'heroicon-s-shopping-bag';

    protected static ?int $navigationSort = 1;

    protected static ?string $model = Product::class;

    protected static ?string $cluster = Products::class;

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
                            TextInput::make('product')
                                ->label('Name')
                                ->autocomplete(false)
                                ->required(),
                            RichEditor::make('content')
                                ->label('Content')
                                ->disableToolbarButtons([
                                    'h2',
                                    'h3',
                                    'blockquote',
                                    'codeBlock',
                                    'attachFiles'
                                ])
                                ->required(),
                            Repeater::make('links')
                                ->label('Links')
                                ->minItems(1)
                                ->maxItems(1)
                                ->deletable(false)
                                ->reorderable(false)
                                ->required()
                                ->schema([
                                    TextInput::make('link')
                                        ->label('Link')
                                        ->url(true)
                                        ->prefixIcon('heroicon-c-link')
                                        ->helperText('Link related to the product.')
                                        ->required(),
                                ]),
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
                                ->label('Image')
                                ->acceptedFileTypes(['image/*'])
                                ->maxSize(2048)
                                ->maxItems(1)
                                ->helperText('Width 160px x Height (adjust) | Max 2 MB.')
                                ->required(),
                            Radio::make('type')
                                ->label('Type')
                                ->options([
                                    'black' => 'Black Coffee',
                                    'cappuccino' => 'Cappuccino Coffee'
                                ])
                                ->required(),
                        ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultGroup('type')
            ->columns([
                CuratorColumn::make('image')
                    ->width(80),
                TextColumn::make('product')
                    ->searchable(),
                TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'black' => 'gray',
                        'cappuccino' => 'warning'
                    })
                ])
                ->paginated(false)
            ->filters([
                SelectFilter::make('type')
                    ->options([
                        'black' => 'Black Coffee',
                        'cappuccino' => 'Cappuccino Coffee',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->color('warning'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
