<?php

namespace App\Filament\Resources\PerbandinganKriteriaResource\Pages;

use App\Filament\Resources\PerbandinganKriteriaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPerbandinganKriterias extends ListRecords
{
    protected static string $resource = PerbandinganKriteriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
