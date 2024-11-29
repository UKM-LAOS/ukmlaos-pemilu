<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Caketum;
use Filament\Widgets\ChartWidget;

class SuaraPemiluChart extends ChartWidget
{
    protected static ?int $sort = 2;
    protected static ?string $heading = 'Suara Pemilu';
    protected static bool $isLazy = false;


    protected function getData(): array
    {
        $caketum = Caketum::withCount('suaraPemilu')->get();
        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => $caketum->map(fn ($caketum) => $caketum->suara_pemilu_count),
                ],
            ],
            'labels' => $caketum->map(fn ($caketum) => $caketum->nama),
        ];
    }

    protected function getType(): string
    {
        return 'Doughnut';
    }
}
