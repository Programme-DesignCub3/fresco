<?php

namespace App\Filament\Resources\ActivityResource\Pages;

use App\Filament\Resources\ActivityResource;
use App\Models\Activity;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateActivity extends CreateRecord
{
    protected static string $resource = ActivityResource::class;

    protected ?string $subheading = 'Create a new activity';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $totalActivity = Activity::all()->count();
        ($totalActivity == 0) ? $data['sort'] = 1 : $data['sort'] = $totalActivity + 1;

        return $data;
    }
}
