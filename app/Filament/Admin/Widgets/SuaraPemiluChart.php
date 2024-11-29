<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Caketum;
use Filament\Widgets\ChartWidget;

class SuaraPemiluChart extends ChartWidget
{
    protected static ?int $sort = 3;
    protected static ?string $heading = 'Suara Pemilu';
    protected static bool $isLazy = false;


    protected function getData(): array
    {
        $caketum = Caketum::withCount('suaraPemilu')->get();
        return [
            'datasets' => [
                [
                    'label' => 'Perolehan Suara',
                    'data' => $caketum->map(fn ($c) => $c->suara_pemilu_count),
                    'backgroundColor' => ['green', 'blue'],
                ],
            ],
            'labels' => $caketum->map(fn ($c) => $c->nama),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
