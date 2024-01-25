<?php

namespace App\Filament\Clusters\Products\Resources\SortProductResource\Pages;

use App\Filament\Clusters\Products\Resources\SortProductResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Database\Eloquent\Builder;

class ManageSortProducts extends ManageRecords
{
    protected static string $resource = SortProductResource::class;

    protected ?string $heading = 'Sort Products';

    protected ?string $subheading = 'Control the order of products';

    public function getTabs(): array
    {
        return [
            'black' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', 'black')),
            'cappuccino' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('type', 'cappuccino')),
        ];
    }
}
