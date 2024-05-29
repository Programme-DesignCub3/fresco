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
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
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
                            ->content(fn (Message $record): string => $record->created_at)
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
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
            ->filters([
                SelectFilter::make('read')
                    ->options([
                        '1' => 'Read',
                        '0' => 'Unread',
                    ])
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->mutateRecordDataUsing(function (array $data): array {
                        if($data['read'] === true) return $data;
                        Message::where('id', $data['id'])->update(['read' => true]);

                        return $data;
                    }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageMessages::route('/'),
        ];
    }
}
