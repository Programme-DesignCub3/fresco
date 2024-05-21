<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Filament\Resources\ArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditArticle extends EditRecord
{
    protected static string $resource = ArticleResource::class;

    protected ?string $subheading = 'Edit an article';

    protected function mutateFormDataBeforeSave(array $data): array
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

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
