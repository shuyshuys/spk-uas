<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlternatifKriteriaResource\Pages;
use App\Filament\Resources\AlternatifKriteriaResource\RelationManagers;
use App\Filament\Resources\AlternatifKriteriaResource\RelationManagers\KriteriaRelationManager;
use App\Models\AlternatifKriteria;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlternatifKriteriaResource extends Resource
{
    protected static ?string $model = AlternatifKriteria::class;

    protected static ?string $label = 'SAW';

    protected static ?string $navigationLabel = 'Manual SAW';

    protected static ?string $pluralLabel = 'SAW';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Input';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('alternatif_id')
                    ->relationship('alternatif', 'nama')
                    ->required(),
                Forms\Components\Select::make('kriteria_id')
                    ->relationship('kriteria', 'nama')
                    ->required(),
                Forms\Components\TextInput::make('nilai')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('alternatif.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kriteria.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nilai')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListAlternatifKriterias::route('/'),
            'create' => Pages\CreateAlternatifKriteria::route('/create'),
            'edit' => Pages\EditAlternatifKriteria::route('/{record}/edit'),
        ];
    }
}
