<?php

namespace App\Filament\Resources\MatriksKeputusanResource\Pages;

use App\Filament\Resources\MatriksKeputusanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMatriksKeputusans extends ListRecords
{
    protected static string $resource = MatriksKeputusanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
