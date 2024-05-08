<?php

namespace App\Filament\Clusters\Products\Resources\ProductResource\Pages;

use App\Filament\Clusters\Products\Resources\ProductResource;
use App\Models\Product;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected ?string $subheading = 'Edit a product';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $blackValueFirst = Product::where('type', 'black')->count();
        $cappuccinoValueFirst = Product::where('type', 'cappuccino')->count();

        if($data['type'] == 'black') {
            ($blackValueFirst == 0) ? $data['sort'] = 1 : $data['sort'] = $blackValueFirst + 1;
        } else {
            ($cappuccinoValueFirst == 0) ? $data['sort'] = 1 : $data['sort'] = $cappuccinoValueFirst + 1;
        }

        return $data;
    }
}
