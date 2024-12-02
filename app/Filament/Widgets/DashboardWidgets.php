<?php

namespace App\Filament\Widgets;

use App\Models\KonsistensiRasio;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    protected function getCards(): array
    {
        return [
            Stat::make('Total Pengguna', User::count()),
            Stat::make('Total Pengisian Hari ini', User::whereDate('created_at', today())->count()),
            Stat::make('Total Konsisensi Rasio', KonsistensiRasio::count()),
        ];
    }
}
