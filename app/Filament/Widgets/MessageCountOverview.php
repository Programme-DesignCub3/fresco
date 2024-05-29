<?php

namespace App\Filament\Widgets;

use App\Models\Message;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MessageCountOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $total = Message::all()->count();
        $read = Message::where('read', true)->count();
        $unread = Message::where('read', false)->count();

        return [
            Stat::make('Total Messages', $total)
                ->description("Count of total messages")
                ->descriptionIcon('heroicon-s-rectangle-stack'),
            Stat::make('Read Messages', $read)
                ->description('Count of read messages')
                ->descriptionIcon('heroicon-s-envelope-open'),
            Stat::make('Unread Messages', $unread)
                ->description('Count of unread messages')
                ->descriptionIcon('heroicon-s-envelope'),
        ];
    }
}
