<?php

namespace App\Filament\Clusters\Articles\Resources;

use App\Filament\Clusters\Articles;
use App\Filament\Clusters\Articles\Resources\ArticleCategoryResource\Pages;
use App\Filament\Clusters\Articles\Resources\ArticleCategoryResource\RelationManagers;
use App\Models\ArticleCategory;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleCategoryResource extends Resource
{
    protected static ?string $navigationGroup = 'Categories';

    protected static ?int $navigationSort = 2;

    protected static ?string $model = ArticleCategory::class;

    protected static ?string $navigationIcon = 'heroicon-m-tag';

    protected static ?string $cluster = Articles::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->label('Article Category')
                            ->required()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Category')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ManageArticleCategories::route('/'),
        ];
    }
}
