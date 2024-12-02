<?php

namespace App\Filament\Widgets;

use App\Models\Hasil;
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
            // Stat::make('Total Pengisian Hari ini', User::whereDate('created_at', today())->count()),
            Stat::make('Total Hasil Bulan ini', Hasil::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count()),
        ];
    }
}
