<?php

namespace App\Filament\Resources\MatriksKeputusanResource\Pages;

use App\Filament\Resources\MatriksKeputusanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMatriksKeputusan extends EditRecord
{
    protected static string $resource = MatriksKeputusanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
