<?php

namespace App\Filament\Clusters\Articles\Resources\ArticleCategoryResource\Pages;

use App\Filament\Clusters\Articles\Resources\ArticleCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageArticleCategories extends ManageRecords
{
    protected static string $resource = ArticleCategoryResource::class;

    protected ?string $subheading = 'Displaying all article categories';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
