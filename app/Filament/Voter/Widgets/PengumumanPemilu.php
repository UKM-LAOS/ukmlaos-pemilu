<?php

namespace App\Filament\Voter\Widgets;

use App\Models\StatusPemilu;
use Filament\Widgets\Widget;

class PengumumanPemilu extends Widget
{
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 'full';
    protected static bool $isLazy = false;
    protected static string $view = 'filament.voter.widgets.pengumuman-pemilu';

    public $statusPemilu; // Properti untuk data

    public function mount()
    {
        // Ambil data yang dibutuhkan
        $this->statusPemilu = StatusPemilu::first();
    }

}
