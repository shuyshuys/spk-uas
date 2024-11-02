<?php

namespace App\Filament\Resources\PerbandinganKriteriaResource\Pages;

use App\Filament\Resources\PerbandinganKriteriaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPerbandinganKriteria extends EditRecord
{
    protected static string $resource = PerbandinganKriteriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
