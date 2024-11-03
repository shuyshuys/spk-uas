<?php

namespace App\Filament\Pages;

use Illuminate\Contracts\Support\Htmlable;


class Dashboard extends \Filament\Pages\Dashboard
{
    protected static ?string $title = 'SPK Dashboard';
    // protected static string $routePath = 'admin-points-dashboard';

    protected int | string | array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];

    // protected static ?string $title = 'Dashboard Sistem Pendukung Keputusan';   

    public static function getSidebarParentTitle(): string
    {
        return 'Dash';
    }
}
