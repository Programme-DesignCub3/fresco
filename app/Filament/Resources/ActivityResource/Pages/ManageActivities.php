<?php

namespace App\Filament\Resources\ActivityResource\Pages;

use App\Filament\Resources\ActivityResource;
use App\Models\Activity;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageActivities extends ManageRecords
{
    protected ?string $subheading = 'Controls all activities content';

    protected static string $resource = ActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    $totalActivity = Activity::all()->count();

                    if($totalActivity == 0) {
                        $data['sort'] = 1;
                    } else {
                        $data['sort'] = $totalActivity + 1;
                    }

                    return $data;
                }),
        ];
    }
}
