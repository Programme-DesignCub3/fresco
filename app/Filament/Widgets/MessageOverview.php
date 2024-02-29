<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\MessageResource;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class MessageOverview extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

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
            ->query(MessageResource::getEloquentQuery())
            ->columns([
                TextColumn::make('name')
                    ->label('Name'),
                TextColumn::make('email')
                    ->label('Email'),
                TextColumn::make('subject')
                    ->label('Subject'),
                TextColumn::make('message')
                    ->label('Message')
                    ->limit(30),
                TextColumn::make('created_at')
                    ->label('Sent on')
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ]);
    }
}
