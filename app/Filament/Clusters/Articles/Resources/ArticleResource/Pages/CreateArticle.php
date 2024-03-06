<?php

namespace App\Filament\Clusters\Articles\Resources\ArticleResource\Pages;

use App\Filament\Clusters\Articles\Resources\ArticleResource;
use Awcodes\Curator\Models\Media;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateArticle extends CreateRecord
{
    protected static string $resource = ArticleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['excerpt'] = Str::limit(strip_tags($data['body']), 100);

        return $data;
    }
}
