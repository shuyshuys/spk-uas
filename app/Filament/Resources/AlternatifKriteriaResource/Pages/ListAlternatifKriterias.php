<?php

namespace App\Filament\Resources\AlternatifKriteriaResource\Pages;

use App\Filament\Resources\AlternatifKriteriaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlternatifKriterias extends ListRecords
{
    protected static string $resource = AlternatifKriteriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
