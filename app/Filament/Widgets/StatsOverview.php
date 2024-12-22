<?php

namespace App\Filament\Widgets;

use App\Models\KonsistensiRasio;
use App\Models\Kriteria;
use App\Models\Alternatif;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 3;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Kriteria', Kriteria::count()),
            Stat::make('Total Alternatif', Alternatif::count()),
            Stat::make('Total Konsisensi Rasio', KonsistensiRasio::count()),
        ];
    }
}
