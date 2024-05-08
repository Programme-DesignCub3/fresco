<?php

namespace App\Filament\Clusters\Products\Resources;

use App\Filament\Clusters\Products;
use App\Filament\Clusters\Products\Resources\SortProductResource\Pages;
use App\Models\Product;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SortProductResource extends Resource
{
    protected static ?string $navigationGroup = 'Manage';

    protected static ?string $navigationLabel = 'Sort Products';

    protected static ?string $navigationIcon = 'heroicon-o-arrows-up-down';

    protected static ?int $navigationSort = 2;

    protected static ?string $model = Product::class;

    protected static ?string $cluster = Products::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                CuratorColumn::make('image')
                    ->width(80),
                TextColumn::make('product'),
                TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'black' => 'gray',
                        'cappuccino' => 'warning'
                    })
            ])
            ->reorderable('sort')
            ->paginated(false)
            ->modifyQueryUsing(fn (Builder $query) => $query->orderBy('sort'));
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSortProducts::route('/'),
        ];
    }
}
