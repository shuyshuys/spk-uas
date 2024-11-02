<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MatriksKeputusanResource\Pages;
use App\Filament\Resources\MatriksKeputusanResource\RelationManagers;
use App\Models\MatriksKeputusan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MatriksKeputusanResource extends Resource
{
    protected static ?string $model = MatriksKeputusan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nilai')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('alternatif_id')
                    ->relationship('alternatif', 'id')
                    ->required(),
                Forms\Components\Select::make('kriteria_id')
                    ->relationship('kriteria', 'id')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nilai')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alternatif.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kriteria.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
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
            'index' => Pages\ListMatriksKeputusans::route('/'),
            'create' => Pages\CreateMatriksKeputusan::route('/create'),
            'edit' => Pages\EditMatriksKeputusan::route('/{record}/edit'),
        ];
    }
}
