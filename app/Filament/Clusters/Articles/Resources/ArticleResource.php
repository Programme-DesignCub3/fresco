<?php

namespace App\Filament\Clusters\Articles\Resources;

use App\Filament\Clusters\Articles;
use App\Filament\Clusters\Articles\Resources\ArticleResource\Pages;
use App\Filament\Clusters\Articles\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $navigationGroup = 'Manage';

    protected static ?string $slug = 'all-articles';

    protected static ?int $navigationSort = 1;

    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $cluster = Articles::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Toggle::make('published')
                            ->inline(false)
                            ->label('Publish')
                            ->onIcon('heroicon-o-signal')
                            ->offIcon('heroicon-o-signal-slash'),
                        CuratorPicker::make('image')
                            ->label('Image')
                            ->required(),
                        Radio::make('type')
                            ->options([
                                'article' => 'Article',
                                'promotion' => 'Promotion'
                            ])
                            ->required(),
                        TextInput::make('title')
                            ->label('Title')
                            ->required(),
                        RichEditor::make('body')
                            ->label('Body')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'link',
                                'orderedList',
                                'bulletList',
                                'undo',
                                'redo'
                            ])
                            ->required()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                CuratorColumn::make('image')
                ->width(80),
                TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'article' => 'primary',
                        'promotion' => 'warning'
                    }),
                TextColumn::make('title')
                    ->limit(30)
                    ->toggleable(),
                CheckboxColumn::make('pin')
                    ->beforeStateUpdated(function($record, $state) {
                        $check = Article::where('pin', 1);

                        if($check->count() >= 1) {
                            $check->update(['pin' => null]);
                        }
                    })
                    ->afterStateUpdated(function ($record, $state) {
                        if($record['published'] == 0) {
                            $record->update(['published' => 1]);
                        }

                        $record->pin = $state;
                        $record->save();
                    }),
                ToggleColumn::make('published')
                    ->onIcon('heroicon-o-signal')
                    ->offIcon('heroicon-o-signal-slash')
                    ->afterStateUpdated(function ($record, $state) {
                        if($record['pin'] == 1) {
                            $record->update(['pin' => 0]);
                        }
                    })
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('type')
                    ->options([
                        'article' => 'Article',
                        'promotion' => 'Promotion',
                    ]),
                SelectFilter::make('published')
                    ->options([
                        0 => 'Draft',
                        1 => 'Published',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
