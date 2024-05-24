<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class General extends Cluster
{
    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $slug = 'general-settings';

    protected static ?string $navigationIcon = 'heroicon-c-adjustments-horizontal';
}
