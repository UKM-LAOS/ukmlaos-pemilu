<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Caketum;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class SuaraPemiluOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected static bool $isLazy = false;
    protected function getStats(): array
    {
        $suaraPemilu = Caketum::withCount('suaraPemilu')->get();
        $stat = [];
        foreach($suaraPemilu as $hasil)
        {
            $stat[] = Stat::make($hasil->nama, $hasil->suara_pemilu_count)->extraAttributes([
                'class' => 'w-full'
            ]);
        }
        return $stat;
    }
}
