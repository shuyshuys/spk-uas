<?php

namespace App\Filament\Resources\KonsistensiRasioResource\Pages;

use App\Filament\Resources\KonsistensiRasioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKonsistensiRasio extends EditRecord
{
    protected static string $resource = KonsistensiRasioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
