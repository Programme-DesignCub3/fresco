<?php

namespace App\Filament\Clusters\Articles\Resources\ArticleResource\Pages;

use App\Filament\Clusters\Articles\Resources\ArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditArticle extends EditRecord
{
    protected static string $resource = ArticleResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['excerpt'] = Str::limit(strip_tags($data['body']), 100);

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
