<?php

namespace App\Filament\Pages;

use Illuminate\Contracts\Support\Htmlable;


class Dashboard extends \Filament\Pages\Dashboard
{
    protected static ?string $title = 'Sistem Pendukung Keputusan Dashboard';

    protected static ?string $navigationLabel = 'SPK Dashboard';

    protected int | string | array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];
}
