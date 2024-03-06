<?php

namespace App\Filament\Resources\MessageResource\Pages;

use App\Filament\Resources\MessageResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMessages extends ManageRecords
{
    protected ?string $subheading = 'Collect all responses from respondents';

    protected static string $resource = MessageResource::class;
}
