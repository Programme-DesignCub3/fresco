<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessageResource\Pages;
use App\Filament\Resources\MessageResource\RelationManagers;
use App\Models\Message;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MessageResource extends Resource
{
    protected static ?string $navigationGroup = 'Feedback';

    protected static ?string $model = Message::class;

    protected static ?string $navigationIcon = 'heroicon-s-envelope';

    public static function form(Form $form): Form
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

    public static function table(Table $table): Table
    {
        return $table
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
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageMessages::route('/'),
        ];
    }
}
