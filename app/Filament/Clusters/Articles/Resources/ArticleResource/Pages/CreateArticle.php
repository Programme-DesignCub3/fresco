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

    protected ?string $subheading = 'Create a new article';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $excerpt = null;

        for($i = 0; $i < count($data['content']); $i++) {
            if(isset($data['content'][$i]['type']) && $data['content'][$i]['type'] == 'paragraph') {
                $excerpt .= strip_tags($data['content'][$i]['data']['content']) . ' ';
            }
        }

        $data['excerpt'] = Str::words($excerpt, 18, '...');

        return $data;
    }
}
