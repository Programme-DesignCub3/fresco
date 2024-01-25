<?php

namespace App\Filament\Clusters\Products\Resources\ProductResource\Pages;

use App\Filament\Clusters\Products\Resources\ProductResource;
use App\Models\Product;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageProducts extends ManageRecords
{
    protected static string $resource = ProductResource::class;

    protected ?string $subheading = 'Controls all products content';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    $blackValueFirst = Product::where('type', 'black')->count();
                    $cappuccinoValueFirst = Product::where('type', 'cappuccino')->count();

                    if($data['type'] == 'black') {
                        if($blackValueFirst == 0) {
                            $data['sort'] = 1;
                        } else {
                            $data['sort'] = $blackValueFirst + 1;
                        }
                    } else {
                        if($cappuccinoValueFirst == 0) {
                            $data['sort'] = 1;
                        } else {
                            $data['sort'] = $cappuccinoValueFirst + 1;
                        }
                    }

                    return $data;
                }),
        ];
    }
}
