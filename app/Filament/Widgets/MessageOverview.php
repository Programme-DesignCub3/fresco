<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\MessageResource;
use App\Models\Message;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\TableWidget as BaseWidget;

class MessageOverview extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = 'Unread Messages';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Placeholder::make('name')
                            ->label('Name')
                            ->content(fn (Message $record): string => $record->name),
                        Placeholder::make('email')
                            ->label('Email')
                            ->content(fn (Message $record): string => $record->email),
                        Placeholder::make('subject')
                            ->label('Subject')
                            ->content(fn (Message $record): string => $record->subject),
                        Placeholder::make('message')
                            ->label('Message')
                            ->content(fn (Message $record): string => $record->message),
                        Placeholder::make('created_at')
                            ->label('Sent on')
                            ->content(fn (Message $record): string => $record->created_at),
                    ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Message::where('read', false))
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->limit(30),
                TextColumn::make('email')
                    ->label('Email')
                    ->limit(30),
                TextColumn::make('subject')
                    ->label('Subject')
                    ->limit(30),
                TextColumn::make('message')
                    ->label('Message')
                    ->limit(30),
                TextColumn::make('created_at')
                    ->label('Sent on'),
                IconColumn::make('read')
                    ->label('Read')
                    ->boolean()
                    ->trueIcon('heroicon-s-envelope-open')
                    ->trueColor('info')
                    ->falseIcon('heroicon-s-envelope')
                    ->falseColor('warning')
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->mutateRecordDataUsing(function (array $data): array {
                        if($data['read'] === true) return $data;
                        Message::where('id', $data['id'])->update(['read' => true]);

                        return $data;
                    })
                    ->form([
                        TextInput::make('name')
                            ->label('Name'),
                        TextInput::make('email')
                            ->label('Email'),
                        TextInput::make('subject')
                            ->label('Subject'),
                        Textarea::make('message')
                            ->rows(5)
                            ->label('Message'),
                        DateTimePicker::make('created_at')
                            ->label('Sent on')
                    ]),
            ]);
    }
}
