<?php

namespace App\Filament\Resources\AlternatifKriteriaResource\Pages;

use App\Filament\Resources\AlternatifKriteriaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlternatifKriteria extends EditRecord
{
    protected static string $resource = AlternatifKriteriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
