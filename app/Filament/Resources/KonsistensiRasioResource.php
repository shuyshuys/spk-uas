<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KonsistensiRasioResource\Pages;
use App\Filament\Resources\KonsistensiRasioResource\RelationManagers;
use App\Models\KonsistensiRasio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KonsistensiRasioResource extends Resource
{
    protected static ?string $model = KonsistensiRasio::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kriteria_id')
                    ->relationship('kriteria', 'nama')
                    ->required(),
                Forms\Components\TextInput::make('rasio_konsistensi')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('ci')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('cr')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('hasil')
                    ->options([
                        'Konsisten' => 'Konsisten',
                        'Tidak Konsisten' => 'Tidak Konsisten',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kriteria.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rasio_konsistensi')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ci')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cr')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hasil')
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
            'index' => Pages\ListKonsistensiRasios::route('/'),
            'create' => Pages\CreateKonsistensiRasio::route('/create'),
            'edit' => Pages\EditKonsistensiRasio::route('/{record}/edit'),
        ];
    }
}