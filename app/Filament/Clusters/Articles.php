<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Articles extends Cluster
{
    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Content';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
}
