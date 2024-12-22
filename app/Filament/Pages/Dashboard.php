<?php

namespace App\Filament\Pages;

use Illuminate\Contracts\Support\Htmlable;


class Dashboard extends \Filament\Pages\Dashboard
{
    protected static ?string $title = 'SPK Analytical Hierarchy Process and Weighted Product Dashboard';

    protected static ?string $navigationLabel = 'Dashboard';

    protected int | string | array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];
}
