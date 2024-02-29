<?php

namespace App\Filament\Clusters\Products\Resources;

use App\Filament\Clusters\Products;
use App\Filament\Clusters\Products\Resources\ProductResource\Pages;
use App\Filament\Clusters\Products\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $navigationGroup = 'Manage';

    protected static ?string $slug = 'all-products';

    protected static ?string $navigationLabel = 'Products';

    protected static ?string $model = Product::class;

    protected static ?string $cluster = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('product')
                            ->label('Product Name')
                            ->required(),
                        TextInput::make('link')
                            ->label('Product Link')
                            ->url()
                            ->suffixIcon('heroicon-s-shopping-bag')
                            ->required(),
                        Radio::make('type')
                            ->label('Product Type')
                            ->options([
                                'black' => 'Black Coffee',
                                'cappuccino' => 'Cappuccino Coffee'
                            ])
                            ->required(),
                        CuratorPicker::make('image')
                            ->label('Product Image')
                            ->required(),
                        Hidden::make('sort')
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                CuratorColumn::make('image')
                    ->width(80)
                    ->toggleable(),
                TextColumn::make('product')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('type')
                    ->badge()
                    ->toggleable()
                    ->color(fn (string $state): string => match ($state) {
                        'black' => 'gray',
                        'cappuccino' => 'warning'
                    })
                ])
                ->paginated(false)
                ->defaultSort('type')
            ->filters([
                SelectFilter::make('type')
                    ->options([
                        'black' => 'Black Coffee',
                        'cappuccino' => 'Cappuccino Coffee',
                    ])
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageProducts::route('/'),
        ];
    }
}
