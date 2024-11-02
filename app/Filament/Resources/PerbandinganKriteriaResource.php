<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PerbandinganKriteriaResource\Pages;
use App\Filament\Resources\PerbandinganKriteriaResource\RelationManagers;
use App\Models\PerbandinganKriteria;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PerbandinganKriteriaResource extends Resource
{
    protected static ?string $model = PerbandinganKriteria::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nilai_perbandingan')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('kriteria1_id')
                    ->relationship('kriteria1', 'id')
                    ->required(),
                Forms\Components\Select::make('kriteria2_id')
                    ->relationship('kriteria2', 'id')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nilai_perbandingan')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kriteria1.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kriteria2.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
            'index' => Pages\ListPerbandinganKriterias::route('/'),
            'create' => Pages\CreatePerbandinganKriteria::route('/create'),
            'edit' => Pages\EditPerbandinganKriteria::route('/{record}/edit'),
        ];
    }
}
